

window.onload = function() {

	var pallid = document.getElementsByClassName("bead");

	for (i = 0; i < pallid.length; i++) {

		if (window.getComputedStyle(pallid[i]).getPropertyValue("float") == "left") {

			pallid[i].style.cssFloat = "right";

		} else {

			pallid[i].style.cssFloat = "left";

		}
    }
}

