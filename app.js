
$(document).ready(function () {

    const loginButton = $('.login-btn');
    loginButton.click(function() {
      window.location.href = 'loginPage.php';
    });





    const mapImage = $('#map-image');
    const popup = $('#popup');
    const range1 = { minX: 150, maxX: 300, minY: 235, maxY: 355 };
    const range2 = { minX: 1000, maxX: 1090, minY: 130, maxY: 280 };

    let popupVisible = false;

    function hidePopup() {
        popup.hide();
        popupVisible = false;
    }

    mapImage.click(function (event) {

        const x = event.offsetX;
        const y = event.offsetY;

        console.log(x, y);

        if (x >= range1.minX && x <= range1.maxX && y >= range1.minY && y <= range1.maxY) {
            popup.css({ left: x + 'px', top: y + 'px' });
            popup.show();
            popupVisible = true;

        }

        else if (x >= range2.minX && x <= range2.maxX && y >= range2.minY && y <= range2.maxY) {
            popup.css({ left: x + 'px', top: y + 'px' });
            popup.show();
            popupVisible = true;

        } else {

            if (popupVisible) {
                hidePopup();
            }
        }
    });

    popup.click(function () {
        hidePopup();
    });
});
