# Web Aplikácia pre e-Faktúry

Webová aplikácia na správu a prijímanie e-faktúr v XML formáte.

## Funkcionality
- Registrácia a prihlasovanie užívateľov
- Prijímanie XML faktúr
- Správa faktúr
- Prehliadanie histórie faktúr
- Export faktúr

## Technológie
- Backend: Python (Flask/Django)
- Frontend: HTML, JavaScript
- Databáza: PostgreSQL
- XML spracovanie: lxml

## Inštalácia

```bash
git clone https://github.com/Seixil/Web-pre-fakturaciu
cd Web-pre-fakturaciu
pip install -r requirements.txt
python manage.py migrate
python manage.py runserver
```
