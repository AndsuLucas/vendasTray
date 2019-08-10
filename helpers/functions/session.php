<?php

function session_init(){
    if (!session_start()){
        session_start();
    }
}