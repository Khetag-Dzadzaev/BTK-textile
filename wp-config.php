<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'BTK-textile' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'zP7r=R?;?cwvG[1(6y;Og)V);WqB$REV43[P37A~de>$mb<  -U=jh8K1mmg;uDh' );
define( 'SECURE_AUTH_KEY',  '*(iIptN0#v{A~IN:/cezV>)m5A-OLI_ROTsN*I`V#`hYJfvZ^TXS#:+98wJw4k#1' );
define( 'LOGGED_IN_KEY',    'S)c%35iS75Yot-B1LfbheV6&i)Q9k-_wn{[;-|6gkX=LbpxUcqGz73r^wc?!idr%' );
define( 'NONCE_KEY',        'kE)`:Tr_BtuR8b/,|mRV`dJ6QWE;.D[WT%J.t&2(  4OjrzC?.y6~B0[9oEbf#jC' );
define( 'AUTH_SALT',        'b%W0ijO(.c$Uk<b`k9Ck8$P(9^SiPlb6T^?cmsp2Dem*-(+Y0^VI]sPa{vt7YM6e' );
define( 'SECURE_AUTH_SALT', 'fV7q*@6x%yXqN(G_Q| ^!Da@tE*b$?$cYi/KSO@63G& Giu3b~YU;2TS|k2#Qu~h' );
define( 'LOGGED_IN_SALT',   '&({a,ku,C#1sROioN ;e.@m/)(s~r9*0Jz=c)XU72+)t`i.[/|@~ojk9q7qk,f9!' );
define( 'NONCE_SALT',       'oS;wyzhy?0S<V76%AGjN+WfzUu5>mr].^=Mx]QzLYHcsNe@Ru76lu!kQ`g?G0Iz8' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
