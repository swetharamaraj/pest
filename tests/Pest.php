<?php


use Tests\Feature;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class)->in('Feature','Unit');
//uses(DatabaseMigrations::class)->in('Feature');

uses(RefreshDatabase::class)->in('Feature');
