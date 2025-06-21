import {
  useBlockProps,
  LinkControl,
} from '@wordpress/block-editor';
import { Button, TextControl } from '@wordpress/components';
import { useState } from '@wordpress/element';


export default function Edit({ attributes, setAttributes }) {
  const {
    linkText, linkUrl, linkTarget,
  } = attributes;

  const [isEditingLink, setIsEditingLink] = useState(false);

  return (
    <div {...useBlockProps()}>
      {/* === Link === */}
      <div className="mb-4">
        <TextControl
          label="Texte du lien"
          value={linkText}
          onChange={(value) => setAttributes({ linkText: value })}
        />
        {isEditingLink ? (
          <LinkControl
            value={{ url: linkUrl, opensInNewTab: linkTarget === '_blank' }}

            onChange={(newLink) => {
              console.log('link set:', newLink);
              setAttributes({
                linkUrl: newLink.url,
                linkTarget: newLink.opensInNewTab ? '_blank' : '',
              });
            }}
            onRemove={() =>
              setAttributes({
                linkUrl: '',
                linkTarget: '',
              })
            }
          />
        ) : (
          <Button isSecondary onClick={() => setIsEditingLink(true)}>
            {linkUrl ? 'Modifier le lien' : 'Ajouter un lien'}
          </Button>
        )}
      </div>
    </div>
  );
}
