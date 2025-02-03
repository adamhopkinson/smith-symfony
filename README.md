# Mr & Mrs Smith application test

## Getting started

Assuming you have the repo cloned and symfony installed globally, run:
1. `composer install`
2. `symfony serve`
3. Open http://localhost:8000/calculator

## Testing
There are unit tests for basic arithmetic and application/controller tests for the calculator. To run this, at the command line run:

```
php bin/phpunit
```

## Considerations

In writing this feature, I have considered the following:

1. The calculation result will show a maximum of 3 decimal places as per the design provided - which states `Result: XXX`
2. There is some client-side validation by virtue of using `number` fields - the design of the associated error messages won't match any server-side validation (ie from the divide by zero validation) as I've not focussed on the front-end
3. I've loaded a css file to show the form fields inline; I've chosen this approach as I didn't want to go too in-depth when the test is backend-focussed.
    1. I'm aware that I could instead have done this by deconstructing the form types in the template
    2. I know that best practice would be to version the CSS file using asset mapper
5. I intentionally haven't used an enum for the operators - it's overkill at this level
6. I've also intentionally not used a Calculator Repository, instead opting to put the calculate method in the `Sum` class