# To Do

[ ] Init
   - There should be a `locales` table:
      - ID
      - locale
      - slug
      - nice name
   - Locales are cached to minimize extra queries.

[ ] Routing
   - Being able to define the main language (with/without language slug)

[ ] Database
   - When visiting a URL like domain.example/nl/ translated content should be displayed for the view of the specific Model.
   - Being able to insert/update models for a specific language.
   - Models should use a trait.

[ ] View
    - Add href language tags to prevent duplicated content.

[ ] Documentation
   - Installation
     - Composer
     - Inserting languages
   - Routing
   - Models
