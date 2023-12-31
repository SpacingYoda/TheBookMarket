<?php

const FLASH = 'FLASH_MESSAGES';

const FLASH_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info';
const FLASH_SUCCESS = 'success! you can now login';


function create_flash_message(string $name, string $message, string $type): void
{
    //remove existing message with the name
    if (isset($_SESSION[FLASH][$name])) {
        unset($_SESSION[FLASH][$name]);
    }

    $_SESSION[FLASH][$name] = ['message' => $message, 'type' => $type];
}



function format_flash_message(array $flash_message): string
{
    return sprintf('<div class="alert">%s</div>',
        $flash_message['type'],
        $flash_message['message']
    );
}


function display_flash_message(string $name): void
{
    if (!isset($_SESSION[FLASH][$name])) {
        return;
    }

    //get message from the session
    $flash_message = $_SESSION[FLASH][$name];

    //delete the flash message
    unset($_SESSION[FLASH][$name]);

    //display the flash message
    echo format_flash_message($flash_message);
}


function display_all_flash_messages(): void
{
    if (!isset($_SESSION[FLASH])) {
        return;
    }

    // get flash messages
    $flash_messages = $_SESSION[FLASH];

    // remove all the flash messages
    unset($_SESSION[FLASH]);

    // show all flash messages
    foreach ($flash_messages as $flash_message) {
        echo format_flash_message($flash_message);
    }
}


function flash(string $name = '', string $message = '', string $type = ''): void
{
    if ($name !== '' && $message !== '' && $type !== '') {
        // create a flash message
        create_flash_message($name, $message, $type);
    } elseif ($name !== '' && $message === '' && $type === '') {
        // display a flash message
        display_flash_message($name);
    } elseif ($name === '' && $message === '' && $type === '') {
        // display all flash message
        display_all_flash_messages();
    }
}

?>