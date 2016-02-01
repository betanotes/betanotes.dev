<?php 

class NotesTableSeeder extends Seeder {

    public function run()
    {
        $user = User::firstOrFail();

        $notes1 = new Note();
        $notes1->title = 'How to Begin Birding'; 
        $notes1->public_or_private = 'private';
        $notes1->body = 'Get Excited and Read Up. Gear Up. Get Outside. Some form of binoculars and that field guide you bought earlier are plenty to get started.  As you get better, you may want to invest in a nice camera or a spotting scope (for the really far-off birds), but they’re by no means required.';
        $notes1->user_id = $user->id;
        $notes1->save();

        $notes2 = new Note();
        $notes2->title = 'Migratory Birds of the Central Flyway';
        $notes2->public_or_private = 'public';
        $notes2->body = 'The Central Flyway comprises more than half the landmass of the continental United States, before extending into Central and South America. Audubon works to protect threatened ecosystems, such as riparian habitat in the Colorado River basin and vast sagebrush habitats, on behalf of such iconic bird species as the Yellow-billed Cuckoo and the Greater Sage-Grouse.';
        $notes2->user_id = $user->id;
        $notes2->save();

        $notes3 = new Note();
        $notes3->title = 'Winter Birds';
        $notes3->public_or_private = 'private';
        $notes3->body = 'Create a songbird border of native trees and shrubs to shelter your yard from the wind. Make a brush pile in the corner of the yard to shelter the birds from predators and storms and to provide night roosting places. Rake leaves up under trees and shrubs—and leave them there. Turn part of your lawn into a mini-meadow by letting it grow up in grass and weeds. (Mow it once a year, in late summer.)';
        $notes3->user_id = $user->id;
        $notes3->save();

        $notes4 = new Note();
        $notes4->title = 'Texas Birds'; 
        $notes4->public_or_private = 'public';
        $notes4->body = 'Loggerhead Shrike 
                • Called the “butcher bird” because it impales food on thorns and fences 
                • Gray bird with black, hook-tipped bill 
                • Call is a harsh screeching note 
            Barn Owl 
            • Becoming scarce and hard to find in much of its range Hunts on wing at night patrolling for rodents Prefers more open area 
            • Most common call is a loud, hissing shriek 
            • Uncommon statewide; accidental to rare in Pineywoods and Edwards Plateau
            Eastern Screech-Owl 
            • Small “eared” owl; color may be gray or red 
            • Facial disk dissected by prominent ridge at nose and bill 
            • Prefers open woods 
            • Common call is a whistled trill 
            • Uncommon to common statewide In Trans-Pecos, High Plains, Rolling Plains and Edwards Plateau, the Western Screech-Owl may be as common or more common than its eastern cousin. 
            Great Horned Owl 
            • Large bird, varying shades of gray with barred breast and belly 
            • Large ear tufts, from which it gets its name; can be lowered 
            • Facial disk dissected by bill and nose 
            • Prefers wooded areas • Common statewide except for Pineywoods, where it is uncommon 
            • This is the “hoot owl”; its call is rhythmic hoots—“Who’s awake; me, too”
            Barred Owl 
            • Large, stocky red-gray owl without ear tufts 
            • Wide vertical barring on chest and belly 
            • Distinct two-lobed facial disk dissected by nose and bill ridge
            • Prefers mixed wooded areas • More common to the east in South Texas Thornscrub, Oaks and Prairies and East Texas Pineywoods. 
            • Call is the distinctive “Who cooks, who cooks for you all”
             Killdeer 
             • Although in the shorebird family, this is a much more upland bird 
             • Generally found in grassy or gravelly areas, turf farms, muddy fields, etc. 
             • Listen for a long, drawn-out “deeyee” or “deeeeee” call 
             • Common to abundant statewide
            Red-headed Woodpecker 
            • Strikingly colored black-and-white bird with all-red head 
            • Solid white patch on rump and base of wings 
            • Will fly out to catch insects in air, and will store food • Frequents mature stands of forest, especially with oak
            • Statewide, but is accidental in Trans-Pecos
            Northern Flicker 
            • Can climb trees and pound, but prefers to forage for ants and other insects on the ground 
            • Call is strong “peah” often accompanied with “wik wik wik” or “wika wika wika” 
            • More likely in open wood or edge situations 
            • Statewide; less common in the Pineywoods.
            Golden-fronted Woodpecker 
            • Brownish body with barred, black and white back and wings 
            • Gold nape and nasal bridge 
            • Prefer wooded areas
            • Ranges from uncommon to common statewide, but absent from Pineywoods. In the Oaks and 
            Prairies the Red-bellied Woodpecker would be much more common, while in the Pineywoods the
            Red-bellied Woodpecker replaces the golden-fronted. 
            Ladder-backed Woodpecker 
            • Small black-and-white striped woodpecker with a distinctly patterned face 
            • Male has red crown extending to the eye 
            • Prefers scrub 
            • Common statewide, but absent in Pineywoods 
            Eastern Phoebe 
            • Most likely in woodlands and along edges near water 
            • May occasionally be seen eating small fruit 
            • Call is two rough, whistled notes resembling “phee-bee”
            Vermilion Flycatcher 
            • Fond of open bushes and trees near water 
            • Call is a whistled “peent.” Song is a series of trills and whistles 
            • Accidental in Pineywoods; very rare on Edwards Plateau in December.            
            Blue Jay 
            • Bright blue back, gray face and breast, white belly, black highlights 
            • Large, loud, aggressive bird 
            • Edge bird often associated with mixed or coniferous woodlands 
            • Call resembles “jeer” 
            • Statewide but scarce to absent in Trans-Pecos and South Texas 
            Western Scrub-Jay 
            • Blue back with gray patch across shoulders 
            • Pale gray streaking on breast 
            • Found in dense brushy areas. Associated with oak or juniper 
            • Harsh, scratchy call 
            • Absent from Pineywoods; accidental in South Texas 
            American Crow 
            • Large, overall black bird with short tail and moderately heavy bill 
            • Often found in groups foraging on ground 
            • Distinctive “caw, caw” call 
            • Present statewide, but scarce in Edwards Plateau, South Texas and Trans-Pecos
            Chihuahuan Raven 
            • Longer-winged and heavier-billed than crows 
            • Somewhat shaggy throat feathers • Slightly rising “graak” call 
            • Absent from Pineywoods; accidental in Oaks and Prairies 
            Carolina Chickadee 
            • Small gray bird with black cap and bib, white cheeks 
            • Raucous “chick-a-dee-dee-dee” call 
            • Absent to rare in Trans-Pecos, where it is replaced by Mountain Chickadee
            Black-crested Titmouse 
            • Gray back, buffy side, black crest, pale forehead 
            • Call a very angry “ti ti ti sii sii zhee zhee zhhe”
            • Absent from Pineywoods; uncommon in Oaks and Prairies, where it is replaced by the Tufted Titmouse 
            • Feeds on seeds and insects gleaned from leaves and branches
            Tufted Titmouse 
            • Gray crest and black forehead distinguish it from Black-crested Titmouse 
            • Song a loud “peter peter peter”; call a scratchy “tsee-day, day, day,” almost chickadee-like
            • Deciduous forests, swamps and orchards are preferred habitat types 
            • Replaces Black-crested Titmouse in High Plains and Rolling Plains, Oaks and Prairies, and East Texas Pineywoods
            Verdin 
            • Gray bird with yellow head 
            • Gleans insects from twigs and flowers. 
            • Call a high-pitched “tseewf” 
            • Absent from Pineywoods; rare in Oaks and Prairies 
            Carolina Wren 
            • Feisty little red bird with abundant striping on wings and tail—tail often held vertically
            • Prominent white eye stripe bordered by black 
            • Long, pointed black bill
            • Song is loud “teakettle, teakettle, teakettle, tea” 
            • Common to abundant statewide
            Bewick’s Wren 
            • Small, gray to red-gray bird with long, striped tail often held high to near vertically 
            • Prominent white eye stripe 
            • Gray on side of neck 
            • Fond of dense, brushy habitats 
            • Song is an elaborate series of whistled phrases and trills; call is raspy and scolding 
            • Scarce in Pineywoods; common to abundant otherwise 
            House Wren 
            • Small brown bird with short, striped tail 
            • Eye stripe very pale to nearly absent 
            • Gardens, hedgerows and brushy woods are favored 
            • Very bubbly song. Call is a sharp “chek” 
            • Very rare to common statewide
            Ruby-crowned Kinglet 
            • Very tiny bird—about the same size as the common species of hummingbirds in Texas 
            • Male crown is seldom seen 
            • Call a quick “di-dit.” Song a jumble of notes usually starting with “tsees” followed by
            “tur” and ending with “tee-dah-let” 
            • Usually gleans from the end of branches 
            • Statewide
            Eastern Bluebird 
            • Blue back, orange-red throat and breast, white belly 
            • Found in groups in fields and open woods, may be seen perched on over head lines or in 
            trees
            • During winter may be feeding on smallfruit; also eats insects 
            • Song a warbling whistle “tu-wheettudu”; also dry chatter 
            • Uncommon to common statewide. In west more likely to be replaced by Western or Mountain
            Bluebirds
            Hermit Thrush
            • Brown-gray bird with heavily spotted breast; reddish tail
            • Prefers somewhat open brushy habitat 
            • Song starts with a whistle followed by monotone warble 
            • This is a migrant, often arriving during hunting season in small numbers
            American Robin
            • This is the familiar bird with the grayback, black head and bright red breast 
            • Eats insects but will also take fruit
            • Call a sharp “chup”; song a melodious “cheerily, cheerup, cheerup, cheerily,cheerup” 
            • Becomes more common in late winter
            Northern Mockingbird
            • Our state bird is very common to abundant statewide
            • Gray overall, darker on back, largewhite patches in wing
            • Thin, dark line through the eye
            • Song varies as this bird “mimics”sounds heard; is very repetitive 
            • Open ground with shrubby vegetation is preferred';
        $notes4->user_id = $user->id;
        $notes4->save();

        $notes5 = new Note();
        $notes5->title = 'The Brown Creeper'; 
        $notes5->public_or_private = 'public';
        $notes5->body = 'Adults are brown on the upperparts with light spotting, resembling a piece of tree bark, with white underparts. They have a long thin bill with a slight downward curve and a long stiff tail used for support as the bird creeps upwards. The male creeper has a slightly larger bill than the female. The brown creeper is 11.7–13.5 cm (4.6–5.3 in) long.Its voice includes single very high pitched, short, often insistent, piercing calls; see, or swee. The song often has a cadence like; pee pee willow wee or see tidle swee, with notes similar to the calls.

            As with many of Washington\'s birds, the Cascades divide this species into two subspecies.
            The species has declined in much of North America but appears to be doing well in
            Washington, with a small (not significant) increase on the state\'s breeding bird survey
            since 1966.

            They forage on tree trunks and branches, typically spiraling upwards from the bottom of a
            tree trunk, and then flying down to the bottom of another tree. They creep slowly with their
            body flattened against the bark, probing with their beak for insects. They will rarely feed
            on the ground. They mainly eat small arthropods found in the bark, but sometimes they will
            eat seeds in winter.

            Breeding season typically begins in April. The female will make a partial cup nest either
            under a piece of bark partially detached from the tree, or in a tree cavity. It will lay 3–7
            eggs, and incubation lasts approximately two weeks. Both of the parents help feed the chicks.

            As a migratory species with a northern range, this species is a conceivable vagrant to
            western Europe. However, it is intermediate in its characteristics between common
            treecreeper and short-toed treecreeper, and has sometimes in the past been considered a
            subspecies of the former, although its closest relative seems to be the latter.

            Brown Creepers prefer mature, moist, coniferous forests or mixed coniferous/deciduous forest
            . They are found in drier forests as well, including Engelman Spruce and larch forest in
            eastern Washington. They generally avoid the rainforest of the outer coast. While they
            generally nest in hardwoods, conifers are preferred for foraging.

            Since the two European treecreepers are themselves among the most difficult species on that
            continent to distinguish from each other, a brown creeper would probably not even be
            suspected, other than on a treeless western island, and would be difficult to verify even
            then.

            Brown creeper has occurred as a vagrant to Bermuda and Central America\'s mountains in
            Guatemala, Honduras and the northern cordillera of El Salvador.';
        $notes5->user_id = $user->id;
        $notes5->save();

        $notes6 = new Note();
        $notes6->title = 'Red-Footed Boobies'; 
        $notes6->public_or_private = 'private';
        $notes6->body = 'The red-footed booby (Sula sula) is a large seabird of the booby family, Sulidae. As suggested by the name, adults always have red feet, but the colour of the plumage varies. They are powerful and agile fliers, but they are clumsy in takeoffs and landings. They are found widely in the tropics, and breed colonially in coastal regions, especially islands.
            The red-footed booby is the smallest member of the booby and gannet family at about 70 cm 
            28 in) in length and with a wingspan of up to 1 m (3.3 ft). 
            
            The average weight of 490 adults
            from Christmas Island was 837 g (1.845 lb).[2] It has red legs, and its bill and throat
            pouch are coloured pink and blue. This species has several morphs. In the white morph the
            plumage is mostly white (the head often tinged yellowish) and the flight feathers are black.
            The black-tailed white morph is similar, but with a black tail, and can easily be confused
            with the Nazca and masked boobies. The brown morph is overall brown. 

            The white-tailed brown morph is similar, but has a white belly, rump, and tail. The white
            headed and white-tailed brown morph has a mostly white body, tail and head, and brown wings
            and back. The morphs commonly breed together, but in most regions one or two morphs
            predominates; e.g. at the Galápagos Islands, most belong to the brown morph, though the
            white morph also occurs.
            
            The sexes are similar, and juveniles are brownish with darker wings, and pale pinkish legs,
            while chicks are covered in dense white down.';
        $notes6->user_id = $user->id;
        $notes6->save();

        $notes7 = new Note();
        $notes7->title = 'The Woodcock'; 
        $notes7->public_or_private = 'private';
        $notes7->body = 'The woodcocks are a group of seven or eight very similar living species of wading birds in the genus Scolopax. Only two woodcocks are widespread, the others being localized island endemics. Most are found in the Northern Hemisphere but a few range into the Greater Sundas, Wallacea and New Guinea. Their closest relatives are the typical snipes of the genus Gallinago.

            Woodcocks have stocky bodies, cryptic brown and blackish plumage and long slender bills.
            Their eyes are located on the sides of their heads, which gives them 360° vision.[3] Unlike
            in most birds, the tip of the bill\'s upper mandible is flexible.[1][4][5]

            As their common name implies, the woodcocks are woodland birds. They feed at night or in the
            evenings, searching for invertebrates in soft ground with their long bills. This habit and
            their unobtrusive plumage makes it difficult to see them when they are resting in the day.
            Most have distinctive displays known as "roding", usually given at dawn or dusk.[1][5][6]

            The range of breeding habits of the Eurasian woodcock extends from the west of Ireland \
            eastwards across Europe and Asia preferring mostly boreal forest regions engulfing northern
            Japan, and also from the northern limits of the tree zone in Norway. Continuing south to the
            Pyrenees and the northern limits of Spain. Nests have been found in Corsica and there are
            three isolated Atlantic breeding stations in Azores, Madeira and the Canary Islands. In Asia
            the sites can be seen as far south as Kashmir and the Himalayas.Some woodcocks being popular
            gamebirds, the island endemic species are often quite rare due to overhunting. The pin
            feathers (coverts of the leading primary feather of the wing) of the Eurasian woodcock are
            sometimes used as brushtips by artists, who use them for fine painting work.

            A number of woodcocks are extinct and are known only from fossil or subfossil bones. Due to
            their close relationship to the Gallinago snipes, the woodcocks are a fairly young group of
            birds, even considering that the Charadriiformes themselves are an ancient lineage.
            Gallinago and Scolopax diverged probably around the Late Miocene some 10-5 million years ago.';
        $notes7->user_id = $user->id;
        $notes7->save();

        $notes8 = new Note();
        $notes8->title = 'Tutfted Titmice'; 
        $notes8->public_or_private = 'public';
        $notes8->body = 'The tufted titmouse (Baeolophus bicolor) is a small songbird from North
            America, a species in the tit and chickadee family (Paridae). The black-crested titmouse,
            found from central and southern Texas southwards, was included as a subspecies but is now
            considered a separate species B. atricristatus.

            These birds have grey upperparts and white underparts with a white face, a grey crest, a dark
            forehead and a short stout bill; they have rufous-coloured flanks. The song is usually
            described as a whistled peter-peter-peter. They make a variety of different sounds, most 
            having a similar tone quality.

            The habitat is deciduous and mixed woods as well as gardens, parks and shrubland[2] in the
            eastern United States; they barely range into southeastern Canada in the Great Lakes region.
            They are all-year residents in the area effectively circumscribed by the Great Plains, the
            Great Lakes, the Gulf of Mexico and the Atlantic Ocean. The range is expanding northwards,
            possibly due to increased availability of winter food at bird feeders. The birds are
            nowadays resident all year even in rural Ohio where there are few bird feeders, while it was
            noted around 1905 that many birds from these areas migrated south in winter.

            They forage actively on branches, sometimes on the ground, mainly eating insects, especially
            caterpillars, but also seeds, nuts and berries. They will store food for later use. They
            tend to be curious about their human neighbors and can sometimes be spotted on window ledges
            peering into the windows to watch what\'s going on inside. They are more shy when seen at
            bird feeders; their normal pattern there is to scout the feeder from the cover of trees or
            bushes, fly to the feeder, take a seed, and fly back to cover to eat it.

            Tufted titmice nest in a hole in a tree, either a natural cavity, a man-made nest box, or
            sometimes an old woodpecker nest. They line the nest with soft materials, sometimes plucking
            hair from a live animal such as a dog.[4] If they find shed snake skin, they will try to
            incorporate pieces of it in their nest.[5] Their eggs are under an inch long and are white or
            cream-colored with brownish or purplish spots. Sometimes, a bird born the year before
            remains to help its parents raise the next year\'s young. The pair may remain together and
            defend their territory year-round. These birds are permanent residents and often join small
            mixed flocks in winter. In rare cases, many birds may flock together to rest in a log or 
            tree; some may even suffocate because so many birds are crowded inside of one cavity.';
        $notes8->user_id = $user->id;
        $notes8->save();

        $notes9 = new Note();
        $notes9->title = 'Yellow-bellied Sapsucker'; 
        $notes9->public_or_private = 'public';
        $notes9->body = 'The yellow-bellied sapsucker (Sphyrapicus varius) is a medium-sized woodpecker found in North America, Central America and the Caribbean.
            The yellow-bellied sapsucker is one of four species in the genus Sphyrapicus. First
            described by Carl Linnaeus in 1766, it is monotypic across its sizable range.

            The yellow-bellied sapsucker is a mid-sized woodpecker, measuring 18–22 cm (7.1–8.7 in) in
            length, 34–40 cm (13–16 in) in wingspan and weighing from 40–63 g (1.4–2.2 oz). 

            Adults are black on the back and wings with white bars; they have a black head with white
            lines down the side and a red forehead and crown, a yellow breast and upper belly, a white
            lower belly and rump and a black tail with a white central bar. Adult males have a red 
            throat; females have a white throat.

            They drum and give a cat-like call in spring to declare ownership of territory.

            The red-naped sapsucker is distinguished by having a red nape (back of the head). The hairy
            woodpecker has no red on the crown (front of the head) or throat and has blacker back. The
            downy woodpecker has same markings as the hairy woodpecker but is significantly smaller.
            The breeding habitat of the yellow-bellied sapsucker is forested areas across Canada,
            eastern Alaska and the northeastern United States. They prefer young, mainly deciduous
            forests. There is also a disjunct population found in high elevations of the Appalachian
            Mountains in Virginia, Tennessee, and North Carolina.

            Like other sapsuckers, these birds drill holes in trees and eat the sap and insects drawn to
            it. They may also pick insects from tree trunks or catch them in flight. They also eat fruit
            and berries.

            Yellow-bellied sapsuckers nest in a large cavity excavated in a deciduous tree, often
            choosing one weakened by disease; the same site may be used for several years. Both the male
            and the female work in making the nest, where five or seven white eggs are well concealed.
            Both birds share in hatching.

            They will mate with the same partner from year to year, as long as both birds survive. They
            sometimes hybridize with red-naped sapsuckers or red-breasted sapsuckers where their
            breeding ranges overlap.

            These birds migrate to the southeastern United States, West Indies and Central America,
            leaving their summer range. This species has occurred as a very rare vagrant to Ireland and
            Great Britain.
            In the United States, yellow-bellied sapsuckers are listed and protected under the Migratory
            Bird Treaty Act.Taking, killing, or possessing this species is illegal without a permit.';
        $notes9->user_id = $user->id;
        $notes9->save();

        $notes10 = new Note();
        $notes10->title = 'Imperial Woodpecker'; 
        $notes10->public_or_private = 'public';
        $notes10->body = 'The Imperial Woodpecker (Campephilus imperialis) lived until recently in old-growth forests of pines and oaks in montane areas of northwestern Mexico. With a body mass of ~700 g,it was the largest woodpecker species in the world (Short 1982). Similar in appearance to the closely related Ivory-billed Woodpecker(C. principalis), the Imperial Woodpecker differed mainlyin its larger size, narrower white stripes on its upper back, absence of white on the neck and face, and longer crest. The crest wascrescent-shaped and red with black in males, and forward-curlingand black in females. Imperial Woodpeckers often occurred in groups of 5–10 individuals (Nelson 1898, Lammertink et al. 1996).They were associated with large areas of plateau forest at elevations >2,000 m with abundant mature and dead trees for food and cavities (Collar et al. 1992). Logging of large timber and extraction  672 — Lammertink et al. — Auk, Vol. 128 Ornithology, where the catalogue number of the film is 61027. Hilton, a member of Rhein’s 1953 expedition, was interviewed byM.L. on 30 April 2010. We scanned the individual frames of the original film in a telecline transfer using a Spirit HDTV Datacine. Footage was scanned at a rate of 24 frames s–1 (fps) at an image size of 1,436 × 1,080 pixels. To mitigate considerable camera shake in the Imperial Woodpecker footage, we stabilized two sequences using Adobe After Effects Professional software (films 2 and 3; Adobe, San Jose, California). In the automated stabilization process, frames were occasionally deleted and replaced with duplicated frames. For a frame-by-frame analysis, we recommend reviewing the original footage (film 1). The film clips are available online at www.birds.cornell.edu/imperial. We calculated the duration of climbing hops and wing-flap rates of the Imperial Woodpecker for an estimated range of frame
            rates. Two sources of uncertainty affected estimations of the frame rate at which this film
            was shot. One was the target frame rate—that is, the frame-rate setting used by the filmer
            The second was the inaccuracy or variation around the target frame rate resulting from the
            use of a spring-wound motor in Rhein’s camera, a Ciné-Kodak Special (R. Heintzelman pers.
            comm., F. Hilton pers. comm.). Using Final Cut Pro software, we played the film at various
            frame rates and reviewed the Imperial Woodpecker material plus footage of other birds,
            people, and mules (film 4) that Rhein shot with the same camera. When played at the industry
            standard frame rate for 16-mm film of 24 fps (Malkiewicz 1992), the motions of the Imperial
            Woodpecker and other birds looked natural in most takes (film 1). Scenes with other birds,
            people, and mules earlier in the Rhein film also looked natural or occasionally slightly
            slow at 24 fps (film 4). When played at other possible frame rate settings of 16 fps and 32
            fps (Eastman Kodak 1936), and at variations of less than 24 fps or more than 26 fps, motions
            looked decidedly unnatural. We concluded that the Rhein film was mostly shot at a target 
            rate of 24 fps (with the exception of two takes, explained below) and met that target to
            within a 24- to 26-fps range. In the second take of the film (frames 212–395) and in the
            third take (frames 396–531), climbing and pecking movements of the woodpecker and the rhythm
            of camera shake were markedly slower than in other takes, and the exposure looked darker.
            These two takes were probably shot at a higher frame rate, capturing climbing movements and
            isolated pecks, but not foraging or flight. The ninth and final take (frames 1,842–2,041),
            which includes a third flight, is also rather dark at first but later becomes brighter. We
            made no inferences from takes 2, 3, and 9, which had uncertain target frame rates. We
            measured the diameter of the trunk perches of the woodpecker in Photoshop CS3 software by
            using the foldedwing of the Imperial Woodpecker for scale, assuming a wing length of 30.6 cm
            in this species (Winkler et al. 1995). We estimated a range of possible perch heights of the
            woodpecker from clues in the images and then used a tapering function for trunk diameter
            (Corral-Rivas et al. 2007) to arrive at an estimate of diameterat breast height (DBH) of
            perch trees. For comparative data on climbing hop (stride) duration in other woodpeckers, we
            searched for published studies using the Zoological Record database (apps.isiknowledge.com),
            and we measured stride duration in two videos of Great Slaty Woodpecker (Mulleripicus
            pulverulentus) in of dead trees for pulp had affected >99% of the species’ range by 1995 
            Lammertink et al. 1996). Imperial Woodpeckers were frequently hunted, primarily for their
            meat, for alleged medicinal properties of their feathers, and out of curiosity (Tanner 1964, 
            Lammertink et al. 1996). From 1930 onward, population numbers rapidly declined. The
            disappearance of the Imperial Woodpecker has been attributed to a combination of hunting and
            logging by Collar et al. (1992) and Lammertink et al. (1996), but solely to hunting by
            Tanner (1964) and Snyder et al. (2009). Search efforts for the Imperial Woodpecker in recent
            decades have failed to locate a bird (Tanner 1964, Plimpton 1977, Lammertink et al. 1996, D.
            G. Allen unpubl. data, R. Uranga-Thomas and D. Venegas-Holguín unpubl. data). Reports of
            Imperial Woodpeckers with accurate descriptions by local people indicated the possible
            survival of a few individuals into the early 1990s (Lammertink et al. 1996). However, high
            hunting pressure on wildlife in the Sierra Madre Occidental and a paucity of suitable
            breeding habitat make it unlikely that the species still exists. Written records of the
            Imperial Woodpecker are scant, and the few firsthand accounts are more than a century old 
            Nelson 1898, Lumholtz 1903). About 160 mounted specimens and study skins exist in museums
            around the world (Snyder et al. 2009).
            Thus far, no photographic, film, or sound documentation of the species in life has been
            available. We describe a recently discovered film of an Imperial Woodpecker taken in 1956 by
            William L. Rhein, a dentist and amateur ornithologist. We describe new information about the
            Imperial Woodpecker gleaned from the film, concentrating on climbing and flying movements
            and tree substrate use. We also report on field work in 2010 in southern Durango, where we
            located the Imperial Woodpecker film site, assessed current habitat conditions, searched for
            the species, and interviewed residents about the disappearance of the Imperial Woodpecker.
            We discuss the factors that contributed to the extirpation of the Imperial Woodpecker in the
            film area and its probable extinction throughout its range. Although the existence of an
            Imperial Woodpecker film by Rhein was not known, Rhein has been widely attributed with the
            last sighting record of an Imperial Woodpecker (Tanner 1964, Plimpton 1977, Collar et al.
            1992, Winkler and Christie 2002). However, the years of Rhein’s first and last Imperial
            Woodpecker sightings have been inaccurately reported, his name has been spelled incorrectly,
            and conflicting accounts exist about whether the last bird he saw was alive or freshly kill.
            In the interest of accurately documenting the last records of a species that is probably
            extinct, we reconstruct the final Imperial Woodpecker records from unpublished
            correspondence and interviews.';
        $notes10->user_id = $user->id;
        $notes10->save();

        $notes11 = new Note();
        $notes11->title = 'Bird Migration Routes of the US'; 
        $notes11->public_or_private = 'Public';
        $notes11->body = 'Bird migration is the regular seasonal movement, often north and south along a flyway, between breeding and wintering grounds. Many species of bird migrate. Migration carries high costs in predation and mortality, including from hunting by humans, and is driven primarily by availability of food. It occurs mainly in the northern hemisphere, where birds are funnelled on to specific routes by natural barriers such as the Mediterranean Sea or the Caribbean Sea.

            Historically, migration has been recorded as much as 3,000 years ago by Ancient Greek 
            authors including Homer and Aristotle, and in the Book of Job, for species such as storks,
            turtle doves, and swallows. More recently, Johannes Leche began recording dates of arrivals
            of spring migrants in Finland in 1749, and scientific studies have used techniques including
            bird ringing and satellite tracking. Threats to migratory birds have grown with habitat
            destruction especially of stopover and wintering sites, as well as structures such as power
            lines and wind farms.

            The Arctic tern holds the long-distance migration record for birds, travelling between
            Arctic breeding grounds and the Antarctic each year. Some species of tubenoses 
            Procellariiformes) such as albatrosses circle the earth, flying over the southern oceans,
            while others such as Manx shearwaters migrate 14,000 km (8,700 mi) between their northern
            breeding grounds and the southern ocean. Shorter migrations are common, including
            altitudinal migrations on mountains such as the Andes and Himalayas.

            The timing of migration seems to be controlled primarily by changes in day length. Migrating
            birds navigate using celestial cues from the sun and stars, the earth\'s magnetic field, and
            probably also mental maps.

            Records of bird migration were made as much as 3,000 years ago by the Ancient Greek writers
            Hesiod, Homer, Herodotus and Aristotle. The Bible also notes migrations, as in the Book of
            Job (39:26), where the inquiry is made: "Is it by your insight that the hawk hovers, spreads
            its wings southward?" The author of Jeremiah (8:7) wrote: "Even the stork in the heavens
            knows its seasons, and the turtle dove, the swift and the crane keep the time of their
            arrival."

            Aristotle noted that cranes traveled from the steppes of Scythia to marshes at the
            headwaters of the Nile. Pliny the Elder, in his Historia Naturalis, repeats Aristotle\'s
            observations.

            Aristotle however suggested that swallows and other birds hibernated. This belief persisted
            as late as 1878, when Elliott Coues listed the titles of no less than 182 papers dealing
            with the hibernation of swallows. Even the "highly observant" Gilbert White, in his
            posthumously published 1789 The Natural History of Selborne, quoted a man\'s story about
            swallows being found in a chalk cliff collapse "while he was a schoolboy at
            Brighthelmstone", though the man denied being an eyewitness. However, he also writes that
            "as to swallows being found in a torpid state during the winter in the Isle of Wight or any
            part of this country, I never heard any such account worth attending to", and that if early
            swallows "happen to find frost and snow they immediately withdraw for a time—a circumstance
            this much more in favour of hiding than migration", since he doubts they would "return for a
            week or two to warmer latitudes".

            It was not until the end of the eighteenth century that migration as an explanation for the
            winter disappearance of birds from northern climes was accepted.[1] Thomas Bewick\'s A
            History of British Birds (Volume 1, 1797) mentions a report from "a very intelligent master
            of a vessel" who, "between the islands of Minorca and Majorca, saw great numbers of Swallows
            flying northward", and states the situation in Britain as follows:

            Swallows frequently roost at night, after they begin to congregate, by the sides of rivers
            and pools, from which circumstance it has been erroneously supposed that they retire into
            the water.

            — Bewick[6]
            Bewick then describes an experiment which succeeded in keeping swallows alive in Britain for
            several years, where they remained warm and dry through the winters. He concludes:

            These experiments have since been amply confirmed by ... M. Natterer, of Vienna ... and the
            result clearly proves, what is in fact now admitted on all hands, that Swallows do not in
            any material instance differ from other birds in their nature and propensities [for life in
            the air]; but that they leave us when this country can no longer furnish them with a supply
            of their proper and natural food ...

            — Bewick[7]

            Migration is the regular seasonal movement, often north and south, undertaken by many
            species of birds. Bird movements include those made in response to changes in food
            availability, habitat, or weather. Sometimes, journeys are not termed "true migration"
            because they are irregular (nomadism, invasions, irruptions) or in only one direction
            dispersal, movement of young away from natal area). Migration is marked by its annual
            seasonality.[8] Non-migratory birds are said to be resident or sedentary. Approximately 1800
            of the world\'s 10,000 bird species are long-distance migrants.[9][10]

            Many bird populations migrate long distances along a flyway. The most common pattern
            involves flying north in the spring to breed in the temperate or Arctic summer and returning
            in the autumn to wintering grounds in warmer regions to the south. Of course, in the
            southern hemisphere the directions are reversed, but there is less land area in the far
            south to support long-distance migration.[11]

            The primary motivation for migration appears to be food; for example, some hummingbirds
            choose not to migrate if fed through the winter.[12] Also, the longer days of the northern
            summer provide extended time for breeding birds to feed their young. This helps diurnal
            birds to produce larger clutches than related non-migratory species that remain in the
            tropics. As the days shorten in autumn, the birds return to warmer regions where the
            available food supply varies little with the season.[13]

            These advantages offset the high stress, physical exertion costs, and other risks of the
            migration. Predation can be heightened during migration: Eleonora\'s falcon Falco eleonorae,
            which breeds on Mediterranean islands, has a very late breeding season, coordinated with the
            autumn passage of southbound passerine migrants, which it feeds to its young. A similar
            strategy is adopted by the greater noctule bat, which preys on nocturnal passerine migrants.
            [14][15][16] The higher concentrations of migrating birds at stopover sites make them prone
            to parasites and pathogens, which require a heightened immune response.[11]

            Within a species not all populations may be migratory; this is known as "partial migration".
            Partial migration is very common in the southern continents; in Australia, 44% of non
            passerine birds and 32% of passerine species are partially migratory.[17] In some species,
            the population at higher latitudes tends to be migratory and will often winter at lower
            latitude. The migrating birds bypass the latitudes where other populations may be sedentary,
            where suitable wintering habitats may already be occupied. This is an example of leap-frog
            migration.[18] Many fully migratory species show leap-frog migration (birds that nest at
            higher latitudes spend the winter at lower latitudes), and many show the alternative, chain
            migration, where populations more evenly north and south without reversing order.[19]

            Within a population, it is common for different ages and/or sexes to have different patterns
            of timing and distance. Female chaffinches Fringilla coelebs in Eastern Fennoscandia migrate
            earlier in the autumn than males do.[20]

            Most migrations begin with the birds starting off in a broad front. Often, this front
            narrows into one or more preferred routes termed flyways. These routes typically follow
            mountain ranges or coastlines, sometimes rivers, and may take advantage of updrafts and
            other wind patterns or avoid geographical barriers such as large stretches of open water.
            The specific routes may be genetically programmed or learned to varying degrees. The routes
            taken on forward and return migration are often different.[11] A common pattern in North
            America is clockwise migration, where birds flying North tend to be further West, and flying
            South tend to shift Eastwards.

            Many, if not most, birds migrate in flocks. For larger birds, flying in flocks reduces the
            energy cost. Geese in a V-formation may conserve 12–20% of the energy they would need to fly
            alone.[21][22] Red knots Calidris canutus and dunlins Calidris alpina were found in radar
            studies to fly 5 km/h (3.1 mph) faster in flocks than when they were flying alone.[11]

            Northern pintail skeletons have been found high in the Himalayas Birds fly at varying
            altitudes during migration. An expedition to Mt. Everest found skeletons of northern pintail
            Anas acuta and black-tailed godwit Limosa limosa at 5,000 m (16,000 ft) on the Khumbu Glacie
            .[23] Bar-headed geese Anser indicus have been recorded by GPS flying at up to 6,540 metres 
            21,460 ft) while crossing the Himalayas, at the same time engaging in the highest rates of
            climb to altitude for any bird. Anecdotal reports of them flying much higher have yet to be
            corroborated with any direct evidence.[24] Seabirds fly low over water but gain altitude
            when crossing land, and the reverse pattern is seen in landbirds.[25][26] However most bird
            migration is in the range of 150 to 600 m (490 to 1,970 ft).';
        $notes11->user_id = $user->id;
        $notes11->save();
    }
}