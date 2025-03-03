import CourseList from "@/components/products/ProductList";
import HeroCoursesSection from "@/components/products/HeroProductSection";
import React from "react";

const HomePage = () => {
    return (
        <div className="w-screen overflow-hidden flex flex-col items-center p-3">
            <div className="lg:w-7xl max-w-full flex flex-col items-center gap-4">
                <HeroCoursesSection />
                <CourseList />
            </div>
        </div>
    );
};

export default HomePage;
