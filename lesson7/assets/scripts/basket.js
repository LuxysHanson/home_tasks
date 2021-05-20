window.onload = function () {

    async function sendingRequest(url, data) {
        const response = await fetch(url, {
            method: 'POST',
            body: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });
        return await response.json();
    }

    /* Добавление товара в корзину */
    let elements = document.querySelectorAll('.buy-btn');
    if (elements.length) {
        elements.forEach((value, key) => {
            value.onclick = function () {
                let productId = this.getAttribute('data-id'),
                    productCount = this.getAttribute('data-count');

                var data = "id=" + productId + "&count=" + productCount;

                this.disabled = true;
                sendingRequest( 'api/buy.php', data)
                    .then(data => {
                        if (data.result === "ok") {
                            var total = document.getElementById('total_count'),
                                currentCount = parseInt(total.innerText);

                            this.disabled = false;
                            total.innerText = ++currentCount;
                        }
                    })
            }
        })
    }

    /* Удаление товара из корзины */
    let delBtn = document.querySelectorAll('.del-btn');
    if (delBtn.length) {
        delBtn.forEach(value => {
            value.onclick = function () {

                let basketId = parseInt(this.getAttribute('data-id')),
                    total_count = parseInt(this.getAttribute('data-count')),
                    product_price = this.getAttribute('data-price'),
                    count = prompt("Какое количество товаров удалить??", 1)

                if (count > total_count) {
                    confirm("У вас в корзине количество товаров меньше!")
                    return;
                }

                var diffCount = total_count - count,
                    data = "id=" + basketId + "&count=" + count + "&diff_count=" + diffCount;

                this.disabled = true;
                sendingRequest( 'api/delete.php', data)
                    .then(data => {
                        if (data.result === "ok") {
                            var total = document.getElementById('total_count'),
                                basketTotal = document.getElementById('basket_count'),
                                productTotal = document.getElementById('total_count_' + basketId),
                                basketCount = parseInt(basketTotal.innerText),
                                currentCount = parseInt(total.innerText);

                            this.disabled = false;
                            total.innerText = currentCount - count;
                            basketTotal.innerText = basketCount - (count * product_price);

                            if (diffCount > 0) {
                                this.setAttribute('data-count', diffCount);
                                productTotal.innerText = diffCount;
                            } else {
                                document.getElementById('product_' + basketId).remove()
                            }

                        }
                    })
            }
        })
    }

}