<?php
function idGenerator($num): string
{
    return 'BILL-'.str_pad($num,6,'0',STR_PAD_LEFT);
}
