import { __ } from '@wordpress/i18n';
import {
  useBlockProps,
  PlainText,
} from '@wordpress/block-editor';
import { useEffect } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {
  const { kpis = [] } = attributes;

  // Initialise proprement le tableau
  useEffect(() => {
    if (!kpis.length) {
      setAttributes({
        kpis: [
          { number: '', unit: '', paragraph: '' },
          { number: '', unit: '', paragraph: '' },
          { number: '', unit: '', paragraph: '' },
        ],
      });
    }
  }, []);

  const updateKPI = (index, field, value) => {
    const updated = [...kpis];
    updated[index] = {
      number: updated[index]?.number || '',
      unit: updated[index]?.unit || '',
      paragraph: updated[index]?.paragraph || '',
      [field]: value,
    };
    setAttributes({ kpis: updated });
  };

  return (
    <div {...useBlockProps()} className="grid grid-cols-1 md:grid-cols-3 gap-6">
      {kpis.map((kpi, index) => (
        <div key={index} className="p-4 border rounded">
          <PlainText
            className="text-2xl font-bold"
            placeholder={__('Nombre')}
            value={kpi.number}
            onChange={(val) => updateKPI(index, 'number', val)}
          />
          <PlainText
            className="text-base"
            placeholder={__('Unité (opt)')}
            value={kpi.unit}
            onChange={(val) => updateKPI(index, 'unit', val)}
          />
          <PlainText
            className="text-sm text-gray-600"
            placeholder={__('Description')}
            value={kpi.paragraph}
            onChange={(val) => updateKPI(index, 'paragraph', val)}
          />
        </div>
      ))}
    </div>
  );
}
