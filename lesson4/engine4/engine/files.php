<?php
function getFiles() {
    return array_splice(scandir('files/'),2);
}