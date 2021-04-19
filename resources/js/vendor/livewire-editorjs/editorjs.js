import EditorJS from "@editorjs/editorjs";
import ImageTool from "../../plugins/image";
import List from "@editorjs/list";
import Header from "@editorjs/header";
import Underline from "@editorjs/underline";
import Code from "@editorjs/code";
import InlineCode from "@editorjs/inline-code";
import Quote from "@editorjs/quote";
import Paragraph from "@editorjs/paragraph";
import Embed from "@editorjs/embed";
import SocialPost from "editorjs-social-post-plugin";
import Table from "@editorjs/table";
import Undo from "editorjs-undo";
import Hyperlink from "editorjs-hyperlink";

window.editorInstance = function (
    dataProperty,
    editorId,
    readOnly,
    placeholder,
    logLevel
) {
    return {
        instance: null,
        data: null,

        init() {
            this.data = this.$wire.get(dataProperty);

            this.instance = new EditorJS({
                holder: editorId,

                readOnly,

                placeholder,

                logLevel,

                tools: {
                    image: {
                        class: ImageTool,

                        config: {
                            uploader: {
                                uploadByFile: (file) => {
                                    return new Promise((resolve) => {
                                        this.$wire.upload(
                                            "uploads",
                                            file,
                                            (uploadedFilename) => {
                                                const eventName = `fileupload:${uploadedFilename.substr(
                                                    0,
                                                    20
                                                )}`;

                                                const storeListener = (
                                                    event
                                                ) => {
                                                    resolve({
                                                        success: 1,
                                                        file: {
                                                            url:
                                                                event.detail
                                                                    .url,
                                                        },
                                                    });

                                                    window.removeEventListener(
                                                        eventName,
                                                        storeListener
                                                    );
                                                };

                                                window.addEventListener(
                                                    eventName,
                                                    storeListener
                                                );

                                                this.$wire.call(
                                                    "completedImageUpload",
                                                    uploadedFilename,
                                                    eventName
                                                );
                                            }
                                        );
                                    });
                                },

                                uploadByUrl: (url) => {
                                    const randomname = Math.random()
                                        .toString(36)
                                        .substring(2, 7);

                                    const eventName = `fileupload:${randomname}`;

                                    const storeListener = (event) => {
                                        this[randomname] = {
                                            success: event.detail.status,
                                            file: {
                                                url: event.detail.url,
                                            },
                                        };

                                        window.removeEventListener(
                                            event.detail.event,
                                            storeListener
                                        );
                                    };

                                    window.addEventListener(
                                        eventName,
                                        storeListener
                                    );

                                    return this.$wire
                                        .loadImageFromUrl(url, eventName)
                                        .then((result) => {
                                            return this[randomname];
                                        });
                                },
                            },
                        },
                    },
                    list: List,
                    header: Header,
                    underline: Underline,
                    code: Code,
                    "inline-code": InlineCode,
                    quote: Quote,
                    paragraph: {
                        class: Paragraph,
                        inlineToolbar: true,
                    },
                    embed: {
                        class: Embed,
                        inlineToolbar: true,
                        config: {
                            services: {
                                youtube: true,
                                coub: true,
                                codepen: {
                                    regex: /https?:\/\/codepen.io\/([^\/\?\&]*)\/pen\/([^\/\?\&]*)/,
                                    embedUrl:
                                        "https://codepen.io/<%= remote_id %>?height=300&theme-id=0&default-tab=css,result&embed-version=2",
                                    html:
                                        "<iframe height='300' scrolling='no' frameborder='no' allowtransparency='true' allowfullscreen='true' style='width: 100%;'></iframe>",
                                    height: 300,
                                    width: 600,
                                    id: (groups) => groups.join("/embed/"),
                                },
                            },
                        },
                    },
                    socialPost: SocialPost,
                    table: {
                        class: Table,
                        inlineToolbar: true,
                        config: {
                            rows: 2,
                            cols: 3,
                        },
                    },
                    hyperlink: {
                        class: Hyperlink,
                        config: {
                            shortcut: "CMD+L",
                            target: "_blank",
                            rel: "nofollow",
                            availableTargets: ["_blank", "_self"],
                            availableRels: ["author", "noreferrer"],
                            validate: false,
                        },
                    },
                },

                data: this.data,

                onChange: () => {
                    this.instance
                        .save()
                        .then((outputData) => {
                            this.$wire.set(dataProperty, outputData);
                            console.log(outputData);
                            this.$wire.call("save");
                        })
                        .catch((error) => {
                            console.log("Saving failed: ", error);
                        });
                },
            });
        },
    };
};
