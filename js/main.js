$(document).ready(function () {
    // Fade in effect
    $(".container").hide().fadeIn(800);

    // ADD PRODUCT
    $("#addProductForm").submit(function (event) {
        event.preventDefault();
        if (!validateInputs(this)) return;

        $.ajax({
            type: "POST",
            url: "/actions/add_product.php",
            data: $(this).serialize(),
            success: function (response) {
                showMessage(response, "success");
                loadInventory();
                $("#addProductForm")[0].reset();
            },
            error: function () {
                showMessage("Error adding product!", "error");
            }
        });
    });

    // UPDATE PRODUCT
    $("#updateProductForm").submit(function (event) {
        event.preventDefault();
        if (!validateInputs(this)) return;

        $.ajax({
            type: "POST",
            url: "/actions/update_product.php",
            data: $(this).serialize(),
            success: function (response) {
                showMessage(response, "success");
                loadInventory();
                $("#updateProductForm")[0].reset();
            },
            error: function () {
                showMessage("Error updating product!", "error");
            }
        });
    });

    // DELETE PRODUCT
    $("#deleteProductForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/actions/delete_product.php",
            data: $(this).serialize(),
            success: function (response) {
                showMessage(response, "success");
                loadInventory();
                $("#deleteProductForm")[0].reset();
            },
            error: function () {
                showMessage("Error deleting product!", "error");
            }
        });
    });

    // INPUT VALIDATION FUNCTION
    function validateInputs(form) {
        let isValid = true;
        $(form)
            .find("input")
            .each(function () {
                if ($(this).val().trim() === "") {
                    $(this).addClass("error-input");
                    isValid = false;
                } else {
                    $(this).removeClass("error-input");
                }
            });

        if (!isValid) {
            showMessage("Please fill out all fields!", "error");
        }
        return isValid;
    }

    // LOAD INVENTORY FUNCTION
    function loadInventory() {
        $.ajax({
            url: "/actions/fetch_inventory.php",
            type: "GET",
            success: function (data) {
                $("#inventoryTableBody").html(data);
            },
        });
    }

    // SHOW MESSAGE FUNCTION
    function showMessage(message, type) {
        let msgBox = $("#messageBox");
        msgBox.text(message).removeClass().addClass(type).fadeIn();

        setTimeout(() => {
            msgBox.fadeOut();
        }, 3000);
    }

    loadInventory(); // Load inventory on page load
});
