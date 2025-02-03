# Mr & Mrs Smith application test

## Considerations

In writing this feature, I have considered the following:

- the calculation result will show a maximum of 3 decimal places as per the design provided - which states `Result: XXX`
- I've loaded a css file to show the form fields inline; I've chosen this approach as I didn't want to go too in-depth when the test is backend-focussed.
- 1. I'm aware that I could instead have done this by deconstructing the form types in the template
- 2. I know that best practice would be to version the CSS file using asset mapper
- I intentionally haven't used an enum for the operators - it's overkill at this level
- I've also intentionally not used a Calculator Repository, instead opting to put the calculate method in the `Sum` class
- I considered explicitly mitigating divide by zero issues using either a `callback` or `expression` validator, but as Symfony handles the divide by zero natively, there's not much point