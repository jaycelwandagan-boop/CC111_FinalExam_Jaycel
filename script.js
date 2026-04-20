// SHOW SECTION (TOGGLE SYSTEM)
function showSection(sectionID) {

    document.querySelectorAll('.content').forEach(sec => {
        sec.style.display = 'none';
    });

    document.querySelectorAll('.homecontent').forEach(sec => {
        sec.style.display = 'none';
    });

    const active = document.getElementById(sectionID);
    if (active) {
        active.style.display = 'block';
    }
}

// HOME (LOGO CLICK)
function goHome() {

    document.querySelectorAll('.content').forEach(sec => {
        sec.style.display = 'none';
    });

     document.getElementById('home').style.display = 'block';
    
};

// CLEAR FIELDS
window.onload = function () {

    const clearBtn = document.getElementById("clrbtn");

    if (clearBtn) {
        clearBtn.addEventListener("click", function () {

            let fields = ["surname", "name", "middlename", "address", "contact"];

            fields.forEach(id => {
                let el = document.getElementById(id);
                if (el) el.value = "";
            });

        });
    }
};