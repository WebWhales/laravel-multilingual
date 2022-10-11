# To Do

[ ] Init
   - **Amer:** There should be a `locales` table
      - ID
      - locale
      - slug
      - nice name
      - is_rtl (true|false, default false)
      - default language (true|false, default false)
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
   - Add href language tags to prevent duplicated content.
   - Add dir to opening HTML tag to enable right-left content.
[ ] Documentation
   - Installation
     - Composer
     - Inserting languages
   - Routing
   - Models

[ ] Nice to haves
   - Recognize the locale based on user location. 
