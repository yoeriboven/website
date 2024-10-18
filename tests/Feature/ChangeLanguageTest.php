<?php

it('can visit a url and explicitly set the language with a cookie', function () {
    $this->post('language/nl')->assertCookie('language', 'nl');
});

it('only allows english and dutch', function () {
    $this->post('language/nl')->assertNoContent();
    $this->post('language/en')->assertNoContent();

    $this->post('language/de')->assertNotFound();
});
