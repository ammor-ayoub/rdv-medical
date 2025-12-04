<?php
namespace App\Config;

enum AppointementType: string
{
    case orderAppointment = 'by order';
    case TimeAppointement = 'by time';
}