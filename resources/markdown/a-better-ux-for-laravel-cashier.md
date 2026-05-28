We used to be able to create and confirm a subscription with Laravel Cashier through the API. You would make a call and the API responded if the payment went through. You would then mark the customer as subscribed and you'd be done!

Laravel now offers a Cashier Paddle package and also offers support for Stripe Checkout. 

Unfortunately, these don't use an API for confirmation but they use webhooks.

Here's how Stripe Checkout works with Laravel Cashier.

```php
Route::get('/subscription-checkout', function (Request $request) {
    return $request->user()
        ->newSubscription('default', 'price_monthly')
        ->checkout([
            'success_url' => route('your-success-route'),
            'cancel_url' => route('your-cancel-route'),
        ]);
});
```

You redirect the user to a Stripe URL. The user then completes the payment there and is returned to the success URL.

It's totally possible that your user returns to your website *before* the webhook is called.

Your user will be back at your website, thinking they subscribed, but your app has no idea because they haven't received a webhook event yet.

Your user will be left anxious wondering if their payment was processed correctly.

## How to make this a good user experience?
![Example of an 'order confirmation' screen](/img/articles/awaiting-order-confirmation.png)

In this case you'd want to show your users a waiting screen which refreshes and redirects the user when the webhook is processed.

You do this by polling the subscription status of the user. This means you check the status every few seconds.

You could also use [broadcasting](https://laravel.com/docs/9.x/broadcasting). With broadcasting the server sends a 'subscription confirmed' message to your frontend once it's ready. This costs fewer server resources, but is a bit more work to setup.

Since this is a page that's only viewed once per user, polling is fine.

Building this page is really easy to do with Laravel Livewire.

Let's take a look!

## The Livewire component
Our Livewire component is quite elegant.

```html
<div wire:poll>
	We're confirming your subscription in the background. This might take a minute...
</div>
```

Adding `wire:poll` to a Livewire view means it will re-render the component every two seconds.

```php
class WaitingForConfirmation extends Component
{
    public function render()
    {
        auth()->user()->load('subscriptions');

        if (auth()->user()->subscribed()) {
            session()->flash('success', 'Your account has been upgraded. Welcome!');

            $this->redirect(route('home'));
        }

        return view('livewire.waiting-for-confirmation');
    }
}
```

Every two seconds we are reloading the subscriptions. If the user is subscribed a flash message will be added and the user is redirected to another page.

## In closing

Letting your users know what is going on is an important part of your design. 

Your users will appreciate the info and will wait calmly instead of panicking whether the payment was succesful.
