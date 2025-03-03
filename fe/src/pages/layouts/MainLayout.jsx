import Footer from "@/components/Footer";
import Header from "@/components/Header";
import Navbar from "@/components/Navbar";
import ScrollToTop from "@/components/ui/ScrollToTop";
import React from "react";

const MainLayout = ({ children }) => {
    return (
        <div className="bg-gray-100 dark:bg-black">
            <Header />
            <div className="">
                <Navbar />
                <main className="max-w-full mx-auto">{children}</main>
                <Footer />
                <ScrollToTop />
            </div>
        </div>
    );
};

export default MainLayout;
