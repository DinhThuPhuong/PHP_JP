import React from "react";
import MainLayout from "./pages/layouts/MainLayout";
import HomePage from "./pages/home/HomePage";
import NotFound from "./pages/404/NotFound";
import { Route, Routes } from "react-router-dom";
import { Toaster } from "react-hot-toast";

const App = () => {
    return (
        <>
            <MainLayout>
                <Routes>
                    <Route path="/" element={<HomePage />} />
                    <Route path="/*" element={<NotFound />} />
                </Routes>
            </MainLayout>
            <Toaster />
        </>
    );
};

export default App;
