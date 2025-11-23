document.addEventListener("DOMContentLoaded", () => {

    const result = document.getElementById("result");

    document.getElementById("lookup").addEventListener("click", () => {
        const country = document.getElementById("country").value;
        fetch(`world.php?country=${country}`)
            .then(response => response.text())
            .then(data => {
                result.innerHTML = data;
            });
    });

    document.getElementById("lookup-cities").addEventListener("click", () => {
        const country = document.getElementById("country").value;
        fetch(`world.php?country=${country}&lookup=cities`)
            .then(response => response.text())
            .then(data => {
                result.innerHTML = data;
            });
    });

});
