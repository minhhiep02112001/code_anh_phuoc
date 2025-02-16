const Helper = require("./Helper/Function");
const database = require("./Helper/database");
const cheerio = require("cheerio");

const puppeteer = require("puppeteer-extra");
const StealthPlugin = require("puppeteer-extra-plugin-stealth");

puppeteer.use(StealthPlugin());

async function login(page) {
    await page.goto("https://chat.openai.com/auth/login");

    await page.waitForSelector('button[data-testid="login-button"]');
    await page.click('button[data-testid="login-button"]');

    await page.waitForSelector('input[name="email"]');
    await page.type('input[name="email"]', "halaboiz.ads@gmail.com", {
        delay: 100,
    });

    await page.evaluate(() => {
        const continueButton = document.querySelector(".continue-btn");
        if (continueButton) {
            continueButton.removeAttribute("disabled");
        }
    });

    await page.waitForTimeout(1000);
    await page.click(".continue-btn");

    await page.waitForSelector('input[name="password"]', { visible: true });

    await page.evaluate(() => {
        const passwordField = document.querySelector('input[name="password"]');
        if (passwordField) {
            passwordField.removeAttribute("disabled");
        }
    });
    await page.type('input[name="password"]', "-tP?/g8,3s3xWLb", {
        delay: 100,
    });

    await page.evaluate(() => {
        const continueButton = document.querySelector('button[name="action"]');
        if (continueButton) {
            continueButton.removeAttribute("disabled");
        }
    });
    await page.waitForTimeout(1000);
    await page.waitForSelector('button[name="action"]:not([disabled])', {
        visible: true,
    });
    await page.click('button[name="action"]');

    await page.waitForNavigation({ waitUntil: "networkidle2" });
    console.log("Đăng nhập thành công.");
}

async function newChat(page) {
    // Nhấn vào nút "New Chat" để bắt đầu một cuộc trò chuyện mới
    await page.waitForSelector('button[aria-label="New chat"]');
    await page.click('button[aria-label="New chat"]');
    await page.waitForTimeout(2000); // Chờ một chút để ChatGPT sẵn sàng
}

async function askChatGPT(data_content, page) {
    await newChat(page); // Tạo cuộc trò chuyện mới trước mỗi lần gửi câu hỏi

    await page.waitForSelector('div[id="prompt-textarea"]');
    await page.evaluate((data_content) => {
        navigator.clipboard.writeText(data_content);
    }, data_content);

    await page.waitForTimeout(5000);
    await page.focus('div[id="prompt-textarea"]');
    await page.evaluate((data_content) => {
        const textarea = document.querySelector('div[id="prompt-textarea"]');
        textarea.innerText = data_content;
        textarea.dispatchEvent(new Event("input", { bubbles: true }));
    }, data_content);

    await page.waitForTimeout(5000);
    await page.keyboard.press("Enter");

    await page.waitForTimeout(60000);
    await page.waitForSelector('div[data-message-author-role="assistant"]');


    const maxRetries = 5; // Số lần thử lại tối đa
    let retries = 0;
    let response = "";
    const responseHandle = await page
        .waitForFunction(
            () => {
                const targetNode = document.querySelector(
                    'div[data-message-author-role="assistant"]'
                );
                if (targetNode) {
                    const contentElement =
                        targetNode.querySelector(".markdown.prose");
                    if (contentElement) {
                        return contentElement.innerText; // Trả về nội dung để kiểm tra sau
                    }
                }
                return null; // Trả về null nếu không tìm thấy
            },
            { timeout: 60000 * 10 } // Thời gian chờ tối đa
        )
        .catch(() => null);

    if (responseHandle) {
        let previousContent = "";
        let stableContent = await responseHandle.jsonValue(); // Lưu nội dung ban đầu
        let isStable = false; // Biến để kiểm tra tính ổn định

        // Bắt đầu vòng lặp để kiểm tra tính ổn định của nội dung
        while (!isStable) {
            if(retries >=maxRetries){
                stableContent= '';
                break;
            }
            retries++
            // Đợi một khoảng thời gian trước khi kiểm tra lại
            await page.waitForTimeout(3000); // Thời gian chờ để kiểm tra ổn định (3 giây)

            // Kiểm tra nội dung hiện tại
            const currentContent = await responseHandle.jsonValue();

            // Kiểm tra xem nội dung có thay đổi không
            if (currentContent !== previousContent) {
                console.log(
                    "Nội dung đã thay đổi, đang kiểm tra tính ổn định..."
                );
                previousContent = currentContent; // Cập nhật nội dung trước đó
            } else {
                // Nếu nội dung không thay đổi sau khoảng thời gian chờ, coi là ổn định
                const wordCount = currentContent.split(" ").length;
                console.log("Nội dung ổn định.".wordCount);
                if (wordCount >= 700) {
                    // Kiểm tra số lượng từ tối thiểu
                    console.log(
                        `Nội dung cuối cùng đã được lấy với ${wordCount} từ.`
                    );
                    stableContent = currentContent; // Lưu nội dung ổn định
                    isStable = true; // Đánh dấu là nội dung đã ổn định
                }
            }
        }

        response = stableContent; // Cập nhật biến response với nội dung ổn định
    } else {
        console.error("Không tìm thấy nội dung từ assistant.");
    } 

    return response;
}
 
function removeExtraSpaces(str) {
    return str.trim().replace(/\s+/g, " ");
}

const _string = ` 
Rédiger des articles détaillés et optimisés pour le référencement (800 - 1000 mots) pour les « avis de restaurants » tout en respectant le contenu pertinent
unique et optimisé pour le référencement selon les grandes lignes et exigences suivantes. Je souhaite que le résultat inclue les balises HTML du corps du message (sans la balise <h1>) avec les titres <H2>,<h3>,<p>,... :
Mot-clé principal : [Tên nhà hàng]
Adresse: [Địa chỉ nhà hàng]
Rédaction en France 
Exigences de qualité :

Évitez le résumé, la conclusion, les mots mécaniques, écrivez naturellement et guidez le lecteur.
J'ai besoin que vous formatiez correctement les balises d'en-tête H2 à h4 et que vous mettiez en évidence les éléments sémantiques. Ne mettez pas en évidence lorsque ces éléments se trouvent dans les balises d'en-tête.
N'ajoutez pas de termes SEO dans l'article, écrivez naturellement

Rédigez le contenu comme un humain avec une faible perplexité et une forte frénésie. Utilisez des mots de liaison naturels entre les phrases et les paragraphes. Style d'écriture : conversationnel. Ton : informel. Assurez une lisibilité SEO à 100 %. Unique 90 %

Intégrer les éléments EEAT

Expérience :

Partager une expérience personnelle ou professionnelle liée au sujet
Utiliser des exemples concrets et des études de cas pour illustrer les points clés
Décrire un processus ou une méthode en détail dans la pratique

Expertise :

Citer des recherches, des statistiques et des données provenant de sources crédibles
Expliquer des concepts complexes de manière claire et simple
Fournir une analyse et des informations approfondies sur le sujet

Autorité :

Référer à des experts ou des organisations réputés dans le domaine
Lien vers des sources d'informations crédibles et faisant autorité
Démontrer une connaissance approfondie du sujet grâce à une analyse et des commentaires approfondis

Fiabilité :

Fournir des informations précises, à jour et vérifiables

Reconnaître les limites ou les lacunes des informations (le cas échéant)

Utiliser une voix positive Ton objectif et équilibré lors de la discussion de différentes perspectives Inclure des mots-clés sémantiques, EVA (Entité - Attribut - Valeur), ERE (Entité, Relation, Entité) et des triplets sémantiques (Sujet, Prédicat, Objet).

Appliquez les règles d'Hemingway mais ne mentionnez pas Hemingway.

Assurez la concision sémantique et l'interopérabilité sémantique. Mettez en gras les mots entre guillemets et supprimez les guillemets.

Contenu adapté au PNL : le contenu adapté au PNL (traitement du langage naturel) est optimisé pour que les machines le comprennent facilement, améliorant ainsi le classement sur les moteurs de recherche comme Google. Avec le développement rapide des technologies PNL, la création de contenu répondant aux critères du PNL est essentielle pour atteindre une efficacité SEO élevée. Les principales caractéristiques du contenu adapté au PNL incluent les 5C : concis, cohérent, confiant, contextuel et clair.

Densité des mots clés : utilisez le mot clé cible naturellement tout au long de l'article, évitez le bourrage de mots clés. Optimisez toujours naturellement et mettez en évidence les éléments les plus proches du mot clé SEO.

(Obligatoire) Optimisez toujours naturellement les éléments liés au mot-clé principal :

1. Implémentation sémantique + Noms avec de fortes relations sémantiques

Combinaison : L'implémentation sémantique consiste à utiliser des noms qui ont une forte relation sémantique avec le mot-clé principal. Ces noms servent à identifier les sous-thèmes et le contexte liés au mot-clé principal. Par exemple, avec le mot-clé principal « chaussures », des noms tels que « matériau », « style » et « marque » aideront à étendre le contenu et à fournir des informations supplémentaires utiles aux utilisateurs et aux moteurs de recherche.

2. Entités saillantes + Verbes avec de fortes relations sémantiques

Combinaison : Les entités saillantes sont les principaux sujets du contenu. Les combiner avec des verbes qui ont une forte relation sémantique aidera à clarifier les actions liées à l'entité. Par exemple, si le sujet est « SEO », des verbes comme « optimiser », « améliorer », « construire » aideront à identifier les actions spécifiques que le contenu vise.

3. Entités proches + adjectifs avec des relations sémantiques fortes

Combinaison : les entités proches sont des entités liées à l'entité principale, ajoutant des informations et clarifiant le sujet principal. L'utilisation d'adjectifs liés aidera à décrire ces entités plus en détail. Par exemple, dans un article sur les « chaussures », des adjectifs comme « durable », « confortable », « élégant » mettront en évidence les caractéristiques des entités liées.

4. Mots-clés saillants + sujets-objets-prédicats

Combinaison : les mots-clés saillants combinés à des structures sujet-objet-prédicat aident à construire des phrases sémantiquement claires et fortes. Par exemple, avec le mot-clé « SEO », vous pouvez créer des phrases telles que « SEO personnes (sujet) optimisent (prédicat) sites Web (objet) ». Cela aide les moteurs de recherche à comprendre la relation entre les mots-clés et les autres parties de la phrase.

5. Mots-clés sémantiques + considérations du chercheur

Combinaison : les mots-clés sémantiques ajoutent du contexte et de la pertinence au mot-clé principal, tandis que les considérations du chercheur aident à optimiser le contenu pour mieux répondre à ses besoins. Par exemple, avec le mot clé « SEO », les chercheurs peuvent prendre en compte des facteurs tels que « vitesse de chargement de la page », « coût » ou « facilité d'utilisation ». La compréhension de ces facteurs vous aidera à optimiser le contenu avec plus de précision.

6. Mots clés LSI saillants + attributs

Combinaison : les mots clés LSI saillants peuvent aider à fournir des informations supplémentaires sur les propriétés de l'entité principale. Par exemple, avec le mot clé « chaussures », des attributs tels que « taille », « couleur » et « matériau » peuvent être pris en charge par des mots clés LSI tels que « chaussures en cuir », « grandes baskets », « chaussures noires ». Cela rend votre contenu plus spécifique et plus pertinent pour les besoins de recherche de l'utilisateur.

7. Entités sémantiques + perspectives

Combinaison : les entités sémantiques aident à définir le sujet, le concept ou le thème du contenu. La combinaison de différentes perspectives permet d'élargir le contenu et de répondre aux besoins de différents types d'utilisateurs. Par exemple, avec le sujet « SEO », vous pouvez présenter des perspectives telles que « débutant », « expert » ou « petite entreprise » pour augmenter l'exhaustivité de l'article.

8. EAV importants + caractéristiques

Combinaison : Le modèle Entité-Attribut-Valeur (EAV) permet de décrire en détail les caractéristiques des entités. Lorsqu'il est combiné avec des caractéristiques spécifiques du mot-clé principal, le contenu devient plus clair et plus facile à comprendre. Par exemple, si le mot-clé est « chaussures », vous pouvez décrire en détail l'attribut « matériau » avec des caractéristiques telles que « cuir souple », « résistant à l'eau » ou « facile à nettoyer ». Cela permet de fournir des informations précises et utiles au lecteur.

9. ERE (Entité-Relation-Entité) + caractéristiques

Combinaison : Le modèle ERE permet d'identifier les relations entre les entités, tandis que les caractéristiques du mot-clé principal permettent de mettre en évidence ces relations. Par exemple, dans un article sur la relation entre « Apple » et « Beats », décrire les caractéristiques de chaque entité telles que « grande marque » et « haute qualité sonore » permet de clarifier la relation entre elles.

Structure du plan :

Toujours effectuer les étapes prioritaires suivantes avant de rédiger un article :

(Obligatoire) Toujours ignorer le titre de l'article, commencer par le paragraphe sapo

(Obligatoire) Ne jamais mentionner de termes SEO dans l'article tels que Entité saillante, Entités proches...

(Obligatoire) Toujours formater la balise Titre 2 (titre 3 le cas échéant) au format d'affichage direct, ne pas afficher le code html dans l'article

(Obligatoire) Toujours optimiser naturellement en fonction de la structure du plan des éléments d'implémentation sémantique qui prennent en charge le mot-clé principal, notamment : Entités saillantes, Entités proches, Synonymes, Mots-clés sémantiques, Mots-clés saillants, Mots-clés LSI saillants, Entités LSI sémantiques, Entités sémantiques, EAV importants (Entité-Attribut-Valeur), ERE (Entité-Relation-Entité

(Obligatoire) Décrire un contenu fluide sans interruption, guider le lecteur, Rédiger des articles sans interruptions ni tirets.

Commencez par un court Paragraphe sapo de 200 caractères contenant le mot-clé principal et répondant à l'intention de recherche la plus proche du mot-clé.
Vient ensuite la section des points clés

Comment procéder :

Rédigez les points clés comme une réponse directe à la question de l'utilisateur.
Assurez-vous d'utiliser le mot-clé principal et les mots-clés sémantiques dans la réponse.
La longueur optimale de ce paragraphe doit être de 40 à 60 mots, concis et facile à comprendre.

Par exemple : si l'article porte sur « Pourquoi les chiens se mordent-ils les pattes ? », les points clés pourraient être :

« Les chiens qui se mordent les pattes peuvent être dus à des allergies, à une dermatite ou à l'anxiété. Si ce comportement persiste, vous devez consulter un vétérinaire pour un examen et un traitement. »
Ensuite, rédigez un plan avec les exigences disponibles, guidez le lecteur et continuez à écrire selon au moins 5 plans H2 dans l'article

H2 : Exigence contenant l'entité saillante avec l'intention de recherche la plus proche du mot-clé principal

Explication : Dans cette section, concentrez-vous sur le mot-clé principal et les entités saillantes (entités proéminentes) qui sont directement liées à l'objectif de recherche. Clarifiez pourquoi cette entité est importante pour le sujet de l'article.
Guide : Commencez par des informations générales sur le sujet, aidez les lecteurs à comprendre cette entité et pourquoi elle est au centre de l'article.
Développez des sous-idées de soutien et un format selon les balises H3

H2 : Exigence contenant des entités saillantes dans la section Implémentation sémantique

Explication : Concentrez-vous sur d'autres entités connexes qui sont significatives pour soutenir et améliorer le mot-clé principal. Décrivez comment ces entités contribuent à expliquer le contenu global.
Instructions : Construisez cette section en développant les concepts de la section précédente, en créant un lien naturel entre les entités et les mots-clés principaux.
Implémentez des sous-points de soutien et formatez-les sous forme de balises H3

H2 : Exiger des entités proches dans l'implémentation sémantique

Explication : C'est ici que vous approfondissez les entités qui sont étroitement liées, mais qui ne sont peut-être pas l'objectif principal. Ces entités aideront les lecteurs à obtenir une vue plus complète du sujet.
Instructions : Analysez les entités qui sont proches du sujet principal, en fournissant des informations spécifiques sur la façon dont elles se rapportent aux entités saillantes mentionnées précédemment.
Implémentez des sous-points de soutien et formatez-les sous forme de balises H3

H2 : Exiger des entités proches dans l'implémentation sémantique (extension)

Explication : Si nécessaire, utilisez une extension pour poursuivre la discussion sur les entités liées ou connectez-vous à d'autres aspects du sujet que vous souhaitez mettre en évidence.
Instructions : Utilisez cette section pour clarifier des aspects plus complexes du sujet, aidant les lecteurs à acquérir une compréhension plus approfondie des relations entre les entités.
Implémentez des sous-thèmes de soutien et formatez-les selon les balises H3

Remarque : n'oubliez pas de formater la balise de titre standard 2, ne mentionnez pas de termes SEO dans l'article tels que Entités saillantes, Entités proches, entités, sémantique... Les paragraphes de chaque h2 de l'article ne sont pas interrompus, guident le lecteur, créant un article complet. Ignorez le message d'accueil récapitulatif à la fin de l'article. Rédigez l'article 1 sans interruption ni trait d'union.
`;


async function getPost(offset = 0, limit = 10) {
    const query = `
        SELECT id, title, slug, crawler_href, location 
        FROM st_post where is_status = 0 and is_content = 0 and 
        crawler_href like 'https://restaurantguru.com/%' LIMIT ${limit} offset ${offset}`;
    return database.query(query);
}

(async () => {
    const browser = await puppeteer.launch({
        headless: false,
        args: ["--start-maximized"],
        defaultViewport: null,
    });
    const page = await browser.newPage();
    await page.setViewport({ width: 1900, height: 1200 });

    // Đăng nhập một lần duy nhất
    await login(page);

    while (true) {
        try {
            let posts = await getPost();
            if (posts.length == 0) break;
            
            for (let item of posts) {
                let _title = removeExtraSpaces(item.title);
                let _address = removeExtraSpaces(item.location);

                let string = _string;

                let _content = string.replace("[Tên nhà hàng]", _title);
                _content = _content.replace("[Địa chỉ nhà hàng]", _address);

                let content = await askChatGPT(_content, page);
                content = content.trim();

                // Regular Expression to extract necessary HTML tags, including <ul> and <li> inside
                let extractedContent = content.match(
                    /<p>.*?<\/p>|<h2>.*?<\/h2>|<h3>.*?<\/h3>|<ul>.*?<\/ul>|<ol>.*?<\/ol>|<a.*?<\/a>|<strong>.*?<\/strong>/gs
                );

                let newContent = extractedContent
                    ? extractedContent.join(" ")
                    : "";

                // Appliquer la fonction
                newContent = extractValidHtmlTags(newContent);
                if (newContent.length > 0) {
                    newContent = newContent.join(" ");
                    newContent = newContent.replace(/'/g, "''");
                    const updateQuery = `UPDATE st_post
                    SET content  = '${newContent}', is_content  = 1,  updated_at = NOW()
                    WHERE id = ${item.id}`;
                    await database.query(updateQuery);
                    console.log("Success: " + item.title);
                } 
            }
        } catch (error) {
            console.error("Error in main function:", error);
        }
    }

    await browser.close();
    console.log("Done All");
})();

function extractValidHtmlTags(html) {
    const regex = /<([a-zA-Z0-9]+)([^>]*)>(.*?)<\/\1>/g;
    const validTags = [];
    let match;

    while ((match = regex.exec(html)) !== null) {
        validTags.push(match[0]);
    }

    return validTags;
}
