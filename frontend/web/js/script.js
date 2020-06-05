function showCart(cart) {
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка!');
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
}

$('#cart .modal-body').on('click', '.del-item', function () {
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        type: 'GET',
        data: {
            id:id
        },
        success: function (res) {
            if (!res) alert('Ошибка!');
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
});

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка!');
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
}
$('.add-to-cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/add',
        data: {
            id: id
        },
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка!');
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
});