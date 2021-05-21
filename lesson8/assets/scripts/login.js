window.onload = function () {

    let removeAfterItem = (elem) => {
        if (elem.nextElementSibling) elem.parentNode.removeChild(elem.nextElementSibling)
    }

    document.querySelector('.login-btn').onclick = function () {
        let formData = new FormData(document.querySelector('form')),
            login = document.querySelector('input[name="login"]'),
            password = document.querySelector('input[name="password"]');

        if (login.value && password.value) {
            removeAfterItem(login)
            removeAfterItem(password)
        }

        (async () => {
            const response = await fetch('api/auth.php', {
                method: 'POST',
                body: formData
            });
            const answer = await response.json();

            if (answer.errors) {
                for (var key in answer.errors) {

                    let elem = document.getElementById(key);

                    if (answer.errors[key] !== "") {
                        if (!elem.nextElementSibling) {
                            var error = document.createElement('p');
                            error.classList.add('text-danger');
                            error.innerText = answer.errors[key];
                            elem.parentNode.insertBefore(error, elem.nextSibling)
                        }
                    } else {
                        removeAfterItem(elem)
                    }
                }
                return 0;
            }

            if (answer.result) {
                document.cookie = "auth=" + answer.key + ";max-age=" + 3600 * 2; // на 2 часа
                window.location.href = "/";
            }

        })();
    }

}