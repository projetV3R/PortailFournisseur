/** @type {import('tailwindcss').Config} */
import forms from "@tailwindcss/forms";

export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    100: "#EFF8FC",
                    200: "#DEF1F8",
                    300: "#BCE3F0",
                    400: "#78C6E0",
                    dark: {
                        100: "#1C2E38",
                        200: "#17303A",
                        300: "#105265",
                        400: "#0A3C50",
                    },
                },
                secondary: {
                    100: "#E0EEFA",
                    200: "#C0DDF5",
                    300: "#80BBEA",
                    400: "#0076D5",
                    dark: {
                        100: "#1A2C4A",
                        200: "#152740",
                        300: "#10406A",
                        400: "#072E52",
                    },
                },
                tertiary: {
                    100: "#E1E4E8",
                    200: "#C2C8D0",
                    300: "#8591A0",
                    400: "#0B2341",
                    dark: {
                        100: "#1A1C1F",
                        200: "#15171A",
                        300: "#101215",
                        400: "#090A0C",
                    },
                },
            },
            fontFamily: {
                Alumni: ["Alumni Sans", "sans-serif"],
            },
        },
    },
    plugins: [forms, require("preline/plugin")],
};
