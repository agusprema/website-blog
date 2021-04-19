<template>
    <froala :tag="'textarea'" :config="config" v-model="model" row="50"></froala>
</template>

<script>
    import VueFroala from 'vue-froala-wysiwyg';

    export default {
        name: 'app',
        data () {
            return {
            config: {
                events: {
                    'froalaEditor.initialized': function () {
                        console.log('initialized')
                    }
                },
                pluginsEnabled: [
                    'image', 'link', 'charCounter', 'codeBeautifier', 'codeView', 'colors', 'draggable', 'embedly', 'emoticons',
                    'entities', 'file', 'fontAwesome', 'fontFamily', 'fontSize', 'fullscreen', 'image', 'imageTUI', 'imageManager', 'inlineStyle', 'inlineClass',
                    'lineBreaker', 'lineHeight', 'link', 'lists', 'paragraphFormat', 'paragraphStyle', 'quickInsert', 'quote', 'save', 'table', 'url', 'video', 'wordPaste',
                    'align', 'help', 'print', 'specialCharacters', 'spellChecker'
                ],
                heightMin: 1000,
                heightMax: 1500
            },
            model: 'Edit Your Content Here!'
            }
        }
    }
</script>
