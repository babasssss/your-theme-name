import { useBlockProps, MediaUpload } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
  const { images = [] } = attributes;

  const updateImage = (media, index) => {
    const newImages = [...images];
    newImages[index] = {
      url: media.url,
      id: media.id,
      alt: media.alt || media.title || '',
    };
    setAttributes({ images: newImages });
  };

  const addEmptyImage = () => {
    setAttributes({ images: [...images, {}] });
  };

  const removeImage = (index) => {
    const newImages = images.filter((_, i) => i !== index);
    setAttributes({ images: newImages });
  };

  return (
    <div {...useBlockProps()}>
      <h3>Logos Partenaires</h3>
      <div className="grid grid-cols-4 gap-4 mt-4">
        {images.map((img, i) => (
          <div key={i} className="relative group">
            <MediaUpload
              onSelect={(media) => updateImage(media, i)}
              allowedTypes={['image']}
              value={img?.id}
              render={({ open }) => (
                <div
                  onClick={open}
                  className="cursor-pointer border border-dashed border-gray-400 rounded p-2 h-24 flex items-center justify-center"
                >
                  {img?.url ? (
                    <img
                      src={img.url}
                      alt={img.alt || `Logo ${i + 1}`}
                      className="max-h-20 max-w-full object-contain"
                    />
                  ) : (
                    <Button isSecondary>Sélectionner {i + 1}</Button>
                  )}
                </div>
              )}
            />
            <Button
              isSmall
              isDestructive
              onClick={() => removeImage(i)}
              className="absolute top-0 right-0 opacity-0 group-hover:opacity-100 transition-opacity"
            >
              ✕
            </Button>
          </div>
        ))}
      </div>

      <div className="mt-4">
        <Button isPrimary onClick={addEmptyImage}>
          Ajouter un logo
        </Button>
      </div>
    </div>
  );
}
