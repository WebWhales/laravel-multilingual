# To Do

[ ] Init
   - There should be a `locales` table:
      - ID
      - locale
      - slug
      - nice name
      - is_rtl (default true|false)
   - Locales are cached to minimize extra queries.

[ ] Routing
   - Being able to define the main language (with/without language slug).
[ ] Database
   - When visiting a URL like domain.example/nl/ translated content should be displayed for the view of the specific 
     Model (TDD).
   - Being able to insert/update models for a specific language (TDD).
   - Models should use a trait `Multilingual` (TDD).
   - Being able to retrieve all translations for a model (TDD).

[ ] View
<<<<<<< HEAD
   - Add href language tags to prevent duplicated content.
=======
- Add href language tags to prevent duplicated content.
>>>>>>> 6f5bd91 (Update ToDo)

[ ] Documentation
   - Installation
     - Composer
     - Inserting languages
   - Routing
   - Models

[ ] Nice to haves
   - Recognize the locale based on user location. 
