const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
const plugin = require("tailwindcss/plugin");

module.exports = {
    purge: [
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                xs: "0 0 0 1px rgba(0, 0, 0, 0.05)",
                outline: "0 0 0 3px rgba(66, 153, 225, 0.5)",
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        a: {
                            color: theme("colors.primary"),
                            "&:hover": {
                                color: "#2c5282",
                            },
                        },
                        h1: {
                            marginTop: "0.6em",
                            marginBottom: "0.6em",
                        },
                        h2: {
                            marginTop: "0.6em",
                            marginBottom: "0.6em",
                        },
                        h3: {
                            marginTop: "0.6em",
                            marginBottom: "0.6em",
                        },
                        h4: {
                            marginTop: "0.6em",
                            marginBottom: "0.6em",
                        },
                    },
                },
            }),
        },
        screens: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
        },
        fontSize: {
            xs: "0.75rem",
            sm: "0.875rem",
            base: "1rem",
            lg: "1.125rem",
            xl: "1.25rem",
            "2xl": "1.5rem",
            "3xl": "1.875rem",
            "4xl": "2.25rem",
            "5xl": "3rem",
            "6xl": "4rem",
        },
        colors: {
            light: "#FFFFFF",
            dark: "#16151D",
            primary: "#DD6B20",
            secondary: "#DD6B20",
            gray: colors.coolGray,
            blue: colors.lightBlue,
            red: colors.rose,
            pink: colors.fuchsia,
            orange: colors.orange,
            ...defaultTheme.colors,
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
            fontWeight: ["hover", "focus"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
