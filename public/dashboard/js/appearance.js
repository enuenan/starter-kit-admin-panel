(function () {
    const root = document.documentElement;
    const media = window.matchMedia("(prefers-color-scheme: dark)");
    const savedAppearance = localStorage.getItem("appearance") || "system";

    const isDark =
        savedAppearance === "dark" ||
        (savedAppearance === "system" && media.matches);

    root.setAttribute("data-theme", isDark ? "dark" : "light");
    root.classList.toggle("dark", isDark);
})();

window.setAppearance = function (appearance) {
    const root = document.documentElement;
    const media = window.matchMedia("(prefers-color-scheme: dark)");

    const applyTheme = (isDark) => {
        root.setAttribute("data-theme", isDark ? "dark" : "light");
        root.classList.toggle("dark", isDark);
    };

    const updateButtons = () => {
        document
            .querySelectorAll('button[onclick^="setAppearance"]')
            .forEach((button) => {
                const isActive = appearance === button.value;

                button.setAttribute("aria-pressed", String(isActive));

                // Clear any existing active styles first
                button.classList.remove(
                    "bg-gray-200",
                    "dark:bg-gray-700",
                    "font-semibold"
                );

                // Add active styles if selected
                if (isActive) {
                    button.classList.add(
                        "bg-gray-200",
                        "dark:bg-gray-700",
                        "font-semibold"
                    );
                }
            });
    };

    if (appearance === "system") {
        window.localStorage.removeItem("appearance");
        applyTheme(media.matches);
    } else {
        window.localStorage.setItem("appearance", appearance);
        applyTheme(appearance === "dark");
    }

    updateButtons();
};

// Initialize theme when DOM is fully loaded
window.addEventListener("DOMContentLoaded", () => {
    const savedAppearance =
        window.localStorage.getItem("appearance") || "system";
    window.setAppearance(savedAppearance);
});
