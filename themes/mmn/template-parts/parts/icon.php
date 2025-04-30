<?php 
switch ( $args[ 'type' ] ) { 
  case 'left': 
    echo '
      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 25L10 15L20 5" stroke="currentColor"/>
      </svg>    
    ';
    break;
  case 'right':
    echo '
      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 5L20 15L10 25" stroke="currentColor"/>
      </svg>
    '; 
    break;
  case 'close':
    echo '
      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 5L15 15M25 25L15 15M15 15L25 5M15 15L5 25" stroke="currentColor"/>
      </svg>    
    ';
    break;
}