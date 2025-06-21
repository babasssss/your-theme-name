import {
  useBlockProps,
  MediaUpload,
  RichText,
  LinkControl,
} from '@wordpress/block-editor';
import { Button, TextControl } from '@wordpress/components';
import { useState } from '@wordpress/element';


export default function Edit({ attributes, setAttributes }) {
  const {
    titleHero, paragraphHero,
    button1Text, button1Url, button1Target,
    button2Text, button2Url, button2Target,
    images
  } = attributes;

  const [isEditingLink1, setIsEditingLink1] = useState(false);
  const [isEditingLink2, setIsEditingLink2] = useState(false);

  const updateImage = (media, index) => {
    const newImages = [...images];
    newImages[index] = {
      url: media.url,
      id: media.id,
      alt: media.alt || media.title || '',
    };
    setAttributes({ images: newImages });
  };

  return (
    <div {...useBlockProps()}>
      <RichText 
        tagName="h1" 
        value={titleHero} 
        onChange={(value) => setAttributes({ titleHero: value })} 
        placeholder="Titre du hero" />

      <RichText 
        tagName="p" 
        value={paragraphHero} 
        onChange={(value) => setAttributes({ paragraphHero: value })} 
        placeholder="Paragraphe" />

      {/* === BOUTON 1 === */}
      <div className="mb-4">
        <TextControl
          label="Texte du bouton 1"
          value={button1Text}
          onChange={(value) => setAttributes({ button1Text: value })}
        />
        {isEditingLink1 ? (
          <LinkControl
            value={{ url: button1Url, opensInNewTab: button1Target === '_blank' }}
            onChange={(newLink) =>
              setAttributes({
                button1Url: newLink.url,
                button1Target: newLink.opensInNewTab ? '_blank' : '',
              })
            }
            onRemove={() =>
              setAttributes({
                button1Url: '',
                button1Target: '',
              })
            }
          />
        ) : (
          <Button isSecondary onClick={() => setIsEditingLink1(true)}>
            {button1Url ? 'Modifier le lien du bouton 1' : 'Ajouter un lien au bouton 1'}
          </Button>
        )}
      </div>

      {/* === BOUTON 2 === */}
      <div className="mb-4">
        <TextControl
          label="Texte du bouton 2"
          value={button2Text}
          onChange={(value) => setAttributes({ button2Text: value })}
        />
        {isEditingLink2 ? (
          <LinkControl
            value={{ url: button2Url, opensInNewTab: button2Target === '_blank' }}
            onChange={(newLink) =>
              setAttributes({
                button2Url: newLink.url,
                button2Target: newLink.opensInNewTab ? '_blank' : '',
              })
            }
            onRemove={() =>
              setAttributes({
                button2Url: '',
                button2Target: '',
              })
            }
          />
        ) : (
          <Button isSecondary onClick={() => setIsEditingLink2(true)}>
            {button2Url ? 'Modifier le lien du bouton 2' : 'Ajouter un lien au bouton 2'}
          </Button>
        )}
      </div>

      <div className="grid grid-cols-4 gap-4 mt-6">
        {[...Array(8)].map((_, i) => (
          <MediaUpload
            key={i}
            onSelect={(media) => updateImage(media, i)}
            allowedTypes={['image']}
            value={images[i]?.id}
            render={({ open }) => (
              <div onClick={open} className="cursor-pointer border border-gray-300 p-2">
                {images[i]?.url ? (
                  <img src={images[i].url} alt="" className="w-full h-auto" />
                ) : (
                  <div className="text-center text-sm">Sélectionner une image {i + 1}</div>
                )}
              </div>
            )}
          />
        ))}
      </div>
    </div>
  );
}
