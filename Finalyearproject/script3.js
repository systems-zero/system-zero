function searchPG() {
    let query = document.getElementById("search-query").value.toLowerCase();
    let pgList = document.querySelectorAll(".pd ul li");
    
    pgList.forEach(pg => {
        let title = pg.querySelector(".titles").innerText.toLowerCase();
        let location = pg.querySelector(".location").innerText.toLowerCase();
        
        if (title.includes(query) || location.includes(query)) {
            pg.style.display = "";
        } else {
            pg.style.display = "none";
        }
    });
    
    return false; // Prevent form submission
}
