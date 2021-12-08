# Food Waste Reduction App - Foodit

- Live version: ------
- Github: [https://github.com/TheLoGgI/foodit-mobilapp-web](https://github.com/TheLoGgI/foodit-mobilapp-web)
- URL prototype: [https://www.figma.com/file/uKb1y77lx4XHgHiZa2YfXP/FoodIt-mockup?node-id=0%3A1](https://www.figma.com/file/uKb1y77lx4XHgHiZa2YfXP/FoodIt-mockup?node-id=0%3A1)


## Informationsarkitektur
![information architecture ](https://lasseaakjaer.com/food-reduction-app-information-architecture.jpg)

## Implimentering af brugerundersøgelser
Igennem vores tidliger brugerundersøgelser, som blev gjort i vores oblikatioriske opgave i faget Interaction and experiance design, fik vi lavet en persona som denne implimentering lægge til grund for.
- I vores persona havde vi et ønske om at få implimenteret sorting af allagenre, da vores persona havde laktose, og ville derfor gerne vide hvilket mad man kunne tåle.
- I vores undersøgelser, spurte vi deltagerne om hvorfor de købte mad på sidste salgs dato og her var der mange der svaret det var for at spare penge. Så lige ledes har vi også få det på vores persona. <br>
- Et andet ønske vores persona havde var at kende til hvilke vare der hjælper miljøet. I den forbindelse har vi haft brainstormet på ideér for at løse den problemstilling. 
Løsning vi kom op med, var at bruge gameification i form af badges som både skal få bruger og organisationer til at være mere engageret i at bruge appen. Men også gøre så man kan se hvem der er god til at hjælpe miljøet, ved eventuelt at sælge og køb i appen. 
- Noget en af vores personer gerne ville have, var at få inspiration til sammensætte måltider. Så derfor har vi også en opskriftside.



## Beskrivelse af kode

Vores løsning er lavet som en Single Page Application ( SPA ), hvor vi har importeret alle views i mappen views med filnavnet *.view.php.
Dette gør at vi kan adminstre hvilke views der skal visses med vores client i javascript med vores egen SPA class.

Vi har været nød til at beskærer scopet af projektet til en mængde der kunne overkommes i den tid vi havde til rådighed. Hvilket også vil komme til udtryk i præsentationen.

### Kør løsningen
Gå til [hjemmeside](https://lasseaakjaer.com)


### Test bruger
Opret selv bruger eller brug løsningen med følgende login
- Username: 
- Password: kasper27


### Projekt sturktur
I vores root mappe har vi indelt de forskellige bekymringer i forskellige mapper.

- root
- index.php
    - components
    - icons
    - images
    - scripts
        - classes
    - server
        -  database
    - styles
    - views

I components mappen er der få komponenter som navigation og menu, seperert i deres egen filer. <br>
icons og images indeholder billeder og ikoner brugt i løsningen.<br>
I scripts er der lavet et main script til at initialisere vores SPA med en tilhørende routes.js fil, som indeholder siderne i løsningen.<br>
I server mappen har vi ting fra serveren, så php filer der forbinder til database eller api endpoints der bliver kaldt med javascript undgår at appen bliver genloadet, så det virker så flydende som muligt. Her ligger filen autoload.php, som loader alle vores views fra views mappen ind i vores index fil. 

### Arbejdes methode
Vi har i gruppen splittet arbejdet op, så vidt muligt og brugt git og github til at samarbejde omkring projektet.


## Test af løsning
Efter at have desigede vores prototype i Figma, lavede vi en kort test på 4 personer.
Hvor vi fik dem til at gå igennem vores prototype i en speak-out-loud test, hvor de skulle løse nogle opgaver i vores prototype.
- Vi fik dem til at gå igennem vores onboarding, for at se om de kunne forstå de forskellige eksemplar vi præsenterede og så de kunne få en fornemmelse af appen.
- Efter spurte vi dem hvad de forventede af appen, efter at have fået præsenterede onboarding.
- De skulle så oprette en bruger og logge in.
- Her efter kom de til vores dashboard, hvor man kan se forskellige produkter i forskellige kategorier. Eksemplevis nogle man har købt ved tidliger eller nogle der sælger noget i nærheden af dig.
- Vi spurte dem om hvad de syntes om designet, layoutet og om de kunne forstå alt hvad der var på siden.
- Vi bad dem da om at finde et produkt uden hvede, hvor de skulle sorter i forskellige allagener.
- Efter at have fundet produktet, skulle de finde bedst før datoen og resevere maden.
- De fik da lov til at gå igennem vores købsprocess, hvor de kunne komme med kommentar til layout o.s.v.
Til sidst skulle de finde en opskift, igen bare komme med kommentar til udsende og brugeroplevelsen.
