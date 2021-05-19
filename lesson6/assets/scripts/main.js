window.onload = function () {
    document.querySelector('.btn-form').onclick = function () {

        let value1 = document.querySelector('input[name="value1"]').value,
            value2 = document.querySelector('input[name="value2"]').value,
            operation = document.querySelector('select[name="operation"]').value;

        if (value1 === "" || value2 === "") {
            confirm("Заполните все значения!!!");
            return;
        }

        var loading = document.getElementById('loading');
        loading.classList.remove('d-none');

        (async () => {

            const response = await fetch('form.php', {
                method: 'POST',
                body: "value1=" + value1 + "&value2="+ value2 + "&operation="+ operation,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });
            const answer = await response.json();

            document.querySelector('.total_count').setAttribute('value', answer.result);
            loading.classList.add('d-none');
        })();
    }
}