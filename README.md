Q1.Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.
-POST is used to send form data securely in the request body. If GET were used, the data would appear in the URL. Refreshing the page could also resubmit the form and create duplicate records.

Q2.When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.
-Laravel automatically stops the code when validation fails. It redirects the visitor back to the form and displays the validation errors.

Q3.Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.
-The success message uses a flash session, which is stored temporarily. It appears only once after saving and disappears when the visitor navigates to another page.
