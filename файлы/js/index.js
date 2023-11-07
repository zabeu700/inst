new Vue({
    el: '#app',
    data: {
        advantages: [
            { title: 'Увеличение продуктивности', subtitle: 'Проект предоставляет полностью автоматизированную' +
                    ' платформу по которой легко путешествовать и которой удобно пользоваться' },
            { title: 'Высокая статистика', subtitle: 'Крайне высокий рейтинг в данной сфере позволяет нам очень хорошо выделяться среди конкурентов и более того, без особых усилий привлекать больший поток заинтересованных клиентов.' },
            { title: 'Улучшение эффективности в предоставлении услуг', subtitle: 'Сайт постоянно модернизируется, чтобы каждому нашему пользователю было комфортно и приятно работать с нами' },
            { title: 'Рост и развитие нашей команды', subtitle: 'В отличии от других предприятий мы постоянно улучшаем наш проект, добавляя новые функции и упрощая пользование самим сайтом. Достигая положительных рейтингов, мы лишь с большим усилием начинаем новый виток развития нашего проекта.' },
            { title: 'Отличная репутация', subtitle: 'Отличная репутация сама за себя говорит, поскольку постоянный приток и нововведения обеспечивают огромный поток заинтересованных лиц, одним из которых вы и являетесь.' },
            { title: 'Простота', subtitle: 'Новая усовершенствованная система поддержки и регистрации свела ваши' +
                    ' действия к нескольким нажатиям, в случае любых неполадок и вопросов наша администрация незамедлительно поможет вам.' },
        ],

        sponsors: [
            { logo: 'mac.png' },
            { logo: 'mastercard.png' },
            { logo: 'carlsberg.png' },
            { logo: 'panasonic.png' },
            { logo: 'vodafone.png' },
            { logo: 'nestle.png' },
            { logo: 'morshynska.png' },
            { logo: 'gerben.png' },
            { logo: 'foxtrot.png' },
            { logo: 'fanta.png' },
            { logo: 'danone.png' },
            { logo: 'kyivstar.png' },
            { logo: 'fitness.png' },
            { logo: 'actimet.png' },
            { logo: 'dirol.png' },
            { logo: 'nan.png' },
            { logo: 'polyphor.png' },
            { logo: 'one.png' },
            { logo: 'lion.png' },
            { logo: 'unicef.png' },
            { logo: 'mivina.png' },
            { logo: 'torchin.png' },
            { logo: 'comfy.png' },
            { logo: 'DanisSimo.png' },
            { logo: 'oriflame.png' },
            { logo: 'gourmet.png' },
            { logo: 'decathlon.png' },
            { logo: 'eva.png' },
            { logo: 'avon.png' },
            { logo: 'wws.png' },
            { logo: 'yopro.png' },
            { logo: 'gsk.png' },
            { logo: 'mattel.png' },
            { logo: 'carat.png' },
            { logo: 'kernel.png' },
            { logo: 'intertop.png' },

        ],

        partners: [
            { name: '_agentgirl_', description: 'НАСТЯ ИВЛЕЕВА', avatar: '_agentgirl_.jpg', since: '03.04.2019', salary: '1500000' },
            { name: 'samoylovaoxana', description: 'Samoylova Oxana', avatar: 'samoylovaoxana.jpg', since: '21.07.2019', salary: '1100000' },
            { name: 'goar_avetisyan', description: 'Goar Avetisyan', avatar: 'goar_avetisyan.jpg', since: '19.10.2019', salary: '950000' },
            { name: 'mikhail_litvin', description: 'Михаил Литвин', avatar: 'mikhail_litvin.jpg', since: '02.12.2019', salary: '800000' },
            { name: 'brianmaps', description: 'Брайн Мапс', avatar: 'brianmaps.jpg', since: '19.02.2020', salary: '750000' },
        ],

        nav: [
            { title: 'Преимущства', href: '#advantages'},
            { title: 'Гарантии', href: '#guarantee'},
            { title: 'О проекте', href: '#info'},
            { title: 'Партнёры', href: '#partners'},
            { title: 'Спонсоры', href: '#sponsors'},
        ]
    },
});

$(document).on('click', function (e) {
    if ($(e.target).closest(".menu-open").length === 0) {
        $('.menu-content').fadeOut();
    }
});

$('.menu-open').click(function () {
    $('.menu-content').fadeIn();
});

$('nav a').click(function (event) {
    event.preventDefault();
    let id = $(this).attr('href'),
        top = $(id).offset().top-50;
    $('body, html').animate({scrollTop: top}, 1000);
});