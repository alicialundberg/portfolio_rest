# portfolio_rest

Webbtjänsten innehåller följande filer:

**Provider** - En klass innehållandes ett databasobjekt som kopplar upp mot databasen och erbjuder samtliga CRUD funktionaliteter. Klassen innehåller fyra olika metoder, där varje metod innehåller en SQL-fråga som är formaterad baserat på datan som skickas med. 

**Index** - Mottar och formaterar data från extern källa (Fetch API). Med hjälp av ett switch-påstående kontrolleras vilken HTTP-metod som anropas, där varje case i sin tur anropar en av metoderna från Provider-klassen, för att sedan skicka med den formaterade datan som argument till databasen.

Webbtjänsten är utformad för att vara kompatibel med repot portfolio_app.

En färdig webbsida finns tillgänglig på http://studenter.miun.se/~allu1801/dt173g/projekt/app/

