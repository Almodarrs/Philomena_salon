<?php
if ($payment->isPaid())
{
/** At this point you'd probably want to start the process of delivering the product* to the customer.*/
     print 'betaald';
}
elseif (! $payment->isOpen())
{
/** The payment isn't paid and isn't open anymore. We can assume it was aborted.*/
     print 'niet betaald';
}
else
{
/** The payment is still pending.*/
    print 'Uw betaling is nog niet goedgekeurd. Zodra uw betaling bevestigd is ontvangt u een email.';
}
?>