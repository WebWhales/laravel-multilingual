<?php

declare(strict_types=1);

use WebWhales\DlfHackaton2022\Tests\TestSupport\TestModel;

it('can insert a model for the current locale', function () {
    /** @var TestModel $model */
    $model = TestModel::create([
        'name' => 'Whale',
    ]);

    expect($model->locale_id)->toBe(1);

    app()->setLocale('nl');

    /** @var TestModel $model */
    $model = TestModel::create([
        'name' => 'Whale',
    ]);

    expect($model->locale_id)->toBe(2);
});

it('can retrieve translations for a model', function () {
    /** @var TestModel $model */
    $model = TestModel::create([
        'locale_id' => 1,
        'name' => 'Whale',
    ]);

    $translatedModel = TestModel::create([
        'locale_id' => 2,
        'name' => 'Walvis',
    ]);

    $translations = $model->translations()->get();

    $this->assertFalse(
        $translations->contains($model)
    );
    $this->assertTrue(
        $translations->contains($translatedModel)
    );
});
