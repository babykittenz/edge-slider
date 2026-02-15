/**
 * Shared TypeScript types for the Edge Slider block
 */

export interface Slide {
    id: number;
    imageUrl: string;
    imageId: number;
    title: string;
    description: string;
    buttonText: string;
    buttonUrl: string;
}

export interface BlockAttributes {
    slides: Slide[];
    autoplay: boolean;
    autoplaySpeed: number;
    showArrows: boolean;
    showDots: boolean;
    transitionSpeed: number;
    infinite: boolean;
    pauseOnHover: boolean;
    height: string;
}

export interface EditProps {
    attributes: BlockAttributes;
    setAttributes: (attrs: Partial<BlockAttributes>) => void;
}

export interface SaveProps {
    attributes: BlockAttributes;
}