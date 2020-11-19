<?php


use Tests\Feature;
use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(Tests\TestCase::class)->in('Feature','Unit');
uses(DatabaseMigrations::class)->in('Feature');