<?php

use WebWhales\DlfHackaton2022\Tests\TestSupport\TestModel;

it('can retrieve translations for a model', function () {
    /** @var TestModel $model */
    $model = (new TestModel([
        'locale_id' => 1,
        'name' => 'Whale',
    ]))->save();

    $translatedModel = (new TestModel([
        'locale_id' => 2,
        'name' => 'Walvis',
    ]))->save();

    $translations = $model->translations()->get();

    $this->assertFalse(
        $translations->contains($model)
    );
    $this->assertTrue(
        $translations->contains($translatedModel)
    );
});
