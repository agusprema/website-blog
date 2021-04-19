require("./bootstrap");
require("alpinejs");
import Cookies from "universal-cookie";

const cookies = new Cookies();
const Body = document.querySelector("#body");

window.addEventListener("swal", function (e) {
    Swal.fire(e.detail);
});

/**
 * Switch Theme
 * * Requiere
 * * dotenv
 * * universal-cookie = cookies
 */
const SwitchTheme = document.querySelectorAll("#switchtheme");
(function () {
    if (!cookies.get("theme")) {
        process.env.MIX_THEME_MEDIA
            ? window.matchMedia("(prefers-color-scheme: dark)").matches
                ? ChangeTheme("dark")
                : ChangeTheme("light")
            : ChangeTheme("light");
    }
})();

SwitchTheme.forEach(function (e) {
    e.onchange = () => {
        ChangeTheme();
    };
});

function ChangeTheme(theme) {
    var DataTheme = cookies.get("theme");
    var theme = theme ? theme : DataTheme == "light" ? "dark" : "light";
    for (var i = 0; i < SwitchTheme.length; i++) {
        SwitchTheme[i].checked = theme == "dark" ? true : false;
    }
    cookies.set("theme", theme, {
        expires: new Date(new Date(Date.now()).setMonth(6)),
    });
    if (theme == "dark") {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
}
/**
 * END Switch Theme
 */
