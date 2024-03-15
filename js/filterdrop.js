function myFunction(dropdownId) {
    var dropdown = document.getElementById(dropdownId);
    dropdown.classList.toggle("locked");
}



function filterFunction() {
    var filter, ul, li, a, i;
    filter = input.value.toUpperCase();

    // Assuming you have a common class for all dropdowns, update the selector accordingly
    var dropdowns = document.getElementsByClassName("dropdown-content");

    for (var j = 0; j < dropdowns.length; j++) {
        a = dropdowns[j].getElementsByTagName("a");

        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "block";
            } else {
                a[i].style.display = "none";
            }
        }
    }
}