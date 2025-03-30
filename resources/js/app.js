document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelector(".clear-genres")
        .addEventListener("click", function () {
            const genreCheckboxes = document.querySelectorAll(
                'input[name="genre"]'
            );
            genreCheckboxes.forEach((checkbox) => (checkbox.checked = false));
            document.querySelector("form").submit();
        });

    document
        .querySelector(".clear-platforms")
        .addEventListener("click", function () {
            const platformCheckboxes = document.querySelectorAll(
                'input[name="platform"]'
            );
            platformCheckboxes.forEach(
                (checkbox) => (checkbox.checked = false)
            );
            document.querySelector("form").submit();
        });
});
