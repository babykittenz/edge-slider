/**
 * Slider Block Frontend Script
 */

interface SliderDataset {
    autoplay: string;
    autoplaySpeed: string;
    transitionSpeed: string;
    infinite: string;
    pauseOnHover: string;
}

class SliderBlock {
    private slider: HTMLElement;
    private track: HTMLElement | null;
    private slides: HTMLElement[];
    private prevButton: HTMLButtonElement | null;
    private nextButton: HTMLButtonElement | null;
    private dots: HTMLButtonElement[];

    // Settings from data attributes
    private autoplay: boolean;
    private autoplaySpeed: number;
    private transitionSpeed: number;
    private infinite: boolean;
    private pauseOnHover: boolean;

    private currentIndex: number = 0;
    private autoplayTimer: number | null = null;
    private isTransitioning: boolean = false;


}